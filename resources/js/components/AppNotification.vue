<template>
  <div class="text-center">
    <v-menu>
      <template v-slot:activator="{ on: menu }">
        <v-tooltip bottom>
          <template v-slot:activator="{ on: tooltip }">
            
            <v-btn icon
              v-on="{ ...tooltip, ...menu }">
                <v-icon :color="color">add_alert</v-icon>{{unreadCount}}
            </v-btn>
          </template>
        </v-tooltip>
      </template>
      <v-list>
        <v-list-item v-for="item in unread" :key="item.id">
            <router-link :to="item.path">
                <v-list-item-title @click="readNotification(item)">
                {{item.question}}
                </v-list-item-title>
            </router-link>
        </v-list-item>
        <v-divider></v-divider>
        <v-list-item v-for="item in read" :key="item.id">
          <v-list-item-title>{{item.question}}</v-list-item-title>
        </v-list-item>
      </v-list>
    </v-menu>
  </div>
</template>

<script>

export default {
    data(){
        return{
            read : {},
            unread : {},
            unreadCount : 0,
            soundNotification : "http://soundbible.com/mp3/glass_ping-Go445-1207030150.mp3",
        }
    },
    computed:{
        color(){
            return this.unreadCount > 0 ? 'red' : 'red lighten-4'
        }
    },
    created(){
        if(User.loggedIn()){
            this.getNotifications()
        }
        Echo.private('App.User.' + User.id())
          .notification((notification) => {
              
              this.unread.unshift(notification)
              this.unreadCount ++ ;
              this.playSound()
          })
    },
    methods:{
      playSound(){
        let alert = new Audio(this.soundNotification)
        let playedPromise = alert.play()
        if (playedPromise) {
          playedPromise.catch((e) => {
              if (e.name === 'NotAllowedError' ||
                  e.name === 'NotSupportedError') {
                  console.log(e.name);
              }
          });
        }
      },
        getNotifications(){
            axios.post('/api/notifications')
            .then(res => {
                this.read = res.data.read
                this.unread = res.data.unread
                this.unreadCount = res.data.unread.length
            })
            .catch(error => Exception.handle(error))
        },
        readNotification(notifications){
            axios.post('/api/markAsRead' , {id:notifications.id})
            .then(res => {
                this.unread.splice(Notification,1)
                this.read.unshift(Notification)
                this.unreadCount -- ;
            })
        },
    },
}
</script>

<style>

</style>