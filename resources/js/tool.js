import App from "./app";
const CLASS_FIND_RESULT = '.find-result'
class Tool extends App{
    findResult(_ele) {
        let form = _ele.parents('form')
        let output= {}
        let data = form.serializeArray().map(function (item){
            return output
        });

    }
}
const tool = new Tool()
$(document).on("click",CLASS_FIND_RESULT,function (event){
    tool.findResult($(this))
})