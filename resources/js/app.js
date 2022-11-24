window.$ = require('jquery')
import axios from "axios";
window.axios = axios
axios.defaults.headers.common['gmt'] = - new Date().getTimezoneOffset();
class App {
    constructor() {
        console.log("base App")
    }

    getDataForm(form){
        let output= {}
        form.serializeArray().forEach(function (item){
            output[item.name] = item.value.trim()
        });
        return output;
    }

    uploadFile(file,type=""){
        const urlUpload = configUrls.upload_file || '';
        if(!urlUpload){
            return alert("error url upload!")
        }
        let formData = new FormData()
        formData.append('file',file)
        formData.append('type',type)
        return new Promise((resolve)=>{
            axios.post(urlUpload,formData).then(res=>{
                return resolve(res.data)
            })
        })
    }
    showToaster(text){
        const snack = $('#snackbar');
        snack.addClass('show').html(text)
        setTimeout(function (){
            snack.removeClass('show')
        },3000)
    }
}
export default App

