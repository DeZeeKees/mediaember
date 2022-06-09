// toms playground :D
//general:

var file = document.getElementById("uploadInput");
var isFilterOpen = false;
var isUploadOpen = false;

const unsupportedFile = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
})

function fileUploaded() {
    if (window.location.href.indexOf("uploadedFile") > -1) {
        console.log('hi');
        fileSubmit.fire({
            icon: 'success',
            title: 'File Successfully uploaded'
        })
    } 
}

function emailFailed() {
    if (window.location.href = 'https://10.147.20.133:8090/preview/testing.nl/pages/register.php?emailFailed') {
        Swal.fire({
            icon: 'error',
            title: 'Email already exists',
            text: 'Please fill in a different email',
            backdrop: `
                rgba(0,0,123,0.4)
                url("../media/img/nyanCat.gif")
                left top
                no-repeat
            `
        }).then((result) => {
            if (result.isConfirmed || result.isDismissed === true) {
                window.location.href = './private.php'
            }
        })
    }
}

function onLoad() {
    $(".hyperimg").hide();
}
function privateAndPublicOnload() {
    $(".uploadDiv").hide()
    $(".filterScreen").hide()
}
const text = "Never fear! Your hypersonic gal is here!"
const summon = "One has tried to summon the legendary hypersonic dragonewt. What does one think makes one worthy enough to summon her?"

// #region index
// index code
addGlobalEventListener('click', '.hypernewt', e => {
    var audio = new Audio("./media/sound/hyperGal.mp3");
    audio.play();

    $(".hyperimg").show();
})
// #endregion

// #region about
addGlobalEventListener('click', '.Toasternewt', e => {
    var audio = new Audio("../media/sound/hyperGal.mp3");
    audio.play();

})
// #endregion

// #region private/public files
//display div on upload click
if (isFilterOpen === false) {
    $(".uploadButton").click(function () {
        isFilterOpen = true;
        $(".uploadDiv").show(1000)
    });
}

if (isUploadOpen === false) {
    $(".filterBtn").click(function () {
        isUploadOpen = true
        $(".filterScreen").show(1000)
    });
}

// $(".closeFilter").click(function () {
//     isFilterOpen = false;
//     $(".filterScreen").hide(1000) 
// });

$(".closeUploadScreen").click(function () {
    isUploadOpen = false;
    $(".uploadDiv").hide(1000)
});

$(document).on('submit', '#privateForm', function(e){
    if (file.files.length === 0) {
        e.preventDefault();
        Swal.fire({
            icon: 'error',
            title: 'No file selected',
            text: 'Please select a file before trying to upload air'
        });
    }
    else {
        return;
    }
})

//excluding file extentions so they cany be uploaded
var fileInput = document.getElementById("uploadInput");

fileInput.addEventListener("change", function () {
    // Check that the file extension is supported.
    // If not, clear the input.
    var hasInvalidFiles = false;
    var hasInvalidCharacters = false;
    for (var i = 0; i < this.files.length; i++) {
        var file = this.files[i];

        if (file.name.endsWith(".php") || file.name.endsWith(".exe") || file.name.endsWith(".js")) {
            hasInvalidFiles = true;
        } else if(
        file.name.indexOf('$') > -1 ||
        file.name.indexOf('&') > -1 ||
        file.name.indexOf('(') > -1 ||
        file.name.indexOf(')') > -1 ||
        file.name.indexOf('[') > -1 ||
        file.name.indexOf(']') > -1 ||
        file.name.indexOf('{') > -1 ||
        file.name.indexOf('}') > -1 ||
        file.name.indexOf(';') > -1 ||
        file.name.indexOf(':') > -1 ||
        file.name.indexOf('‘') > -1 ||
        file.name.indexOf('<') > -1 ||
        file.name.indexOf('>') > -1 ||
        file.name.indexOf('`') > -1 ||
        file.name.indexOf('~') > -1) {
            hasInvalidCharacters = true
        }
    }

    if (hasInvalidFiles) {
        fileInput.value = "";
        $('#inputFileName').text('');
        unsupportedFile.fire({
            icon: 'error',
            title: 'File type not supported'
        });
    }

    if(hasInvalidCharacters == true) {
        fileInput.value = "";
        $('#inputFileName').text('');
        unsupportedFile.fire({
            icon: 'error',
            title: 'File contains illegal characters'
        });
    }
});
// upload cancel close thing
// #endregion

$(".btnRegister").click(function(){
    pwStr = $('.passwordRequired1').val();
    pwStr2 = $(".passwordRequired2").val();
    if (pwStr === '' || pwStr2 === '') {
        Swal.fire({
            title: 'No password detected',
            text: 'Please fill in a password',
            width: 600,
            padding: '3em',
            color: '#716add',
            background: '#fff url(/images/trees.png)',
            backdrop: `
              rgba(0,0,123,0.4)
              url("/images/nyan-cat.gif")
              left top
              no-repeat
            `
          })
    }
});

//function for adding event handlers 
function addGlobalEventListener(type, selector, callback) {
    document.addEventListener(type, e => {
        if (e.target.matches(selector)) callback(e);
    });
}