import User from './user';
class Exception{
    handle(error){
        this.isExpired(error.response.data.error)
    }

    isExpired(error){
        if(error == 'Token is Expired')
        {
            User.logout()
        }
    }
}

export default Exception = new Exception()