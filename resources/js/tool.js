import App from "./app";
const CLASS_FIND_RESULT = '.find-result'
class Tool extends App{
    async findResult(_ele) {
        $(".md5-result").html('')
        let form = _ele.parents('form')
        let params = this.getDataForm(form);
        let url = form.attr('action')
        const type = form.attr('method')
        const toFunction = form.attr('data-function')
        let resData = {}
        $("#loading-result").removeClass('d-none')
        if(type==="GET" || type==="get"){
            await axios.get(url,{
                params:params,
            }).then(res=>{
                resData = res.data
            })
        }
        $("#loading-result").addClass('d-none')
        switch (toFunction) {
            case "md5":
                this.md5(resData)
                break;
        }
    }

    md5(res){
       let result = res.data.result;
       $(".md5-result").html(result)
       $(".md5-result").html(result)
    }
}
const tool = new Tool()
$(document).on("click",CLASS_FIND_RESULT,function (event){
    tool.findResult($(this))
})
