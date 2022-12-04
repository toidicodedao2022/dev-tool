import App from "./app";

const INPUT_WIDTH_SCREEN='#width-screen'
const INPUT_PIXEL = '#inp-pixel'
const SELECTOR_OUTPUT = '#result-convert'

class PixelToSdp extends App{
    init() {
        this.setPixelScreen()
    }
    _handlerInputScreen(_ele) {
        const val = _ele.val().trim()
        this.setDataStorage('width_screen', val)
    }
    _handlerInputPixel(_ele) {
        const val = _ele.val()
        const widthScreen = $(INPUT_WIDTH_SCREEN).val() ?? 0;
        const value = val * (300/widthScreen);

        $(SELECTOR_OUTPUT).html(value)
        // 300 1px = 1sdp
        // 375 1px = ?sdp
    }

    setPixelScreen(){
        const pixel = this.getStorage('width_screen')
        $(INPUT_WIDTH_SCREEN).val(parseInt(pixel))
    }
}

const pixelToSdp = new PixelToSdp()

$(document)
    .on("input", INPUT_WIDTH_SCREEN, function (event) {
        pixelToSdp._handlerInputScreen($(this))
    })
    .on("input", INPUT_PIXEL, function (event) {
        pixelToSdp._handlerInputPixel($(this))
    })
    .ready(function (){
        pixelToSdp.init()
    })
