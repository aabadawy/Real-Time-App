class Token{
    isValid(token){
        const payload = this.payload(token)
        if(payload){
            if(payload.iss == "http://realtimeapp.com/api/auth/login")
                return true
            else if(payload.iss == "http://realtimeapp.com/api/auth/signup") 
                return  true
            else
                return false
        }

        return false
    }

    payload(token){
       const payload =  token.split('.')[1]
       return this.decode(payload)
    }

    decode(payload){
        return JSON.parse(atob(payload))
    }
}

export default Token = new Token();

// http://realtimeapp.com/api/auth/login