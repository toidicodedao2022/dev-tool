window.$ = require('jquery')
import axios from "axios";
window.axios =axios
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
}
export default App

