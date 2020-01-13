

 export default function getInfoUser(app) {



    //now retrieval of user information
    let data = axios.get('auth/user')
        .then(function(response){

            return response

        })
        .catch(function (error) {

            console.log(error.response)
        })



    return data;
}



