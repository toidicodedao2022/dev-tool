import App from "./app";

class AdminTool extends App{
    changeFile(_ele) {
        if($(_ele)[0].files.length===0){
            return false;
        }
        super.uploadFile($(_ele)[0].files[0]).then(res=>{
            let oid = res.data.attachment_oid;
            const url = res.data.url
            $('.preview > img').attr('src',url)
            $('input[name="attachment_oid"]').val(oid)
        });
    }
}
const adminTool = new AdminTool()
document.addEventListener('DOMContentLoaded',function (){
    $(this).on('change','#customFile',function (){
        adminTool.changeFile($(this))
    })
})

