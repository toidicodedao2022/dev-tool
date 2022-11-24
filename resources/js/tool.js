import App from "./app";

const CLASS_FIND_RESULT = '.find-result'

class Tool extends App {
    async findResult(_ele) {
        $(".md5-result").html('')
        $(".random-result").val('')
        $(".random-length-result").html('')
        let form = _ele.parents('form')
        let params = this.getDataForm(form);
        let url = form.attr('action')
        const type = form.attr('method')
        const toFunction = form.attr('data-function')
        let resData = {}
        $("#loading-result").removeClass('d-none')
        if (type === "GET" || type === "get") {
            await axios.get(url, {
                params: params,
            }).then(res => {
                resData = res.data
            })
        }

        if (type === "POST" || type === "post") {
            let formData = new FormData()
            form.serializeArray().forEach(item => {
                formData.append(item.name, item.value)
            })
            await axios.post(url, formData).then(res => {
                resData = res.data
            })
        }

        $("#loading-result").addClass('d-none')
        switch (toFunction) {
            case "md5":
                this.md5(resData)
                break;
            case "random":
                this.random(resData)
                break;
            default:
                break
        }
    }

    md5(res) {
        let result = res.data.result;
        $(".md5-result").html(result)
        $(".md5-result").html(result)
    }

    random(res) {
        let result = res.data.result;
        $(".random-result").val(result)
        $(".random-length-result").html(result.length)

    }

    handlerChangeRangeRandom(_ele) {
        let val = _ele.val()
        $('input.random-range[type="number"]').val(val)
    }

    handlerChangeInputRandom(_ele) {
        let val = _ele.val()
        if (val > 50) {
            val = 50
        }
        _ele.val(val)
        $('#random-range').val(val)
    }
    copied(){
        // this.showToaster('COPIED')
    }
}

const tool = new Tool()
$(document)
    .on("click", CLASS_FIND_RESULT, function (event) {
        tool.findResult($(this))
    })
    .on('change', '#random-range', function () {
        tool.handlerChangeRangeRandom($(this))
    })
    .on('input', '#random-range', function () {
        tool.handlerChangeRangeRandom($(this))
    })
    .on('input', 'input.random-range[type="number"]', function () {
        tool.handlerChangeInputRandom($(this))
    })
    .on('click', 'input[readonly="readonly"]', function () {
        tool.copied()
    })