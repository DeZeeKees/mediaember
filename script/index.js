// toms playground :D
//general:
//onload

//onload function to play an audio clio
function onloadHypersonic() {
    var audio = new Audio("../media/sound/hyperGal.mp3");
    audio.play();
}

if (window.location.href.indexOf('hypersonic.php') > -1) {
    Swal.fire({
        icon: 'warning',
        title: 'Hypersonic Dragonewt',
        text: 'thou has summoned the legendary Hypersonic Dragonewt to thou screen',
        showCancelButton: true,
        cancelButtonText: 'Fuck this',
        confirmButtonText: 'Take me',
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                icon: 'success',
                title: 'Enjoy your time',
                confirmButtonText: "Let's go",
                showCancelButton: false,
            })
        }
        if (result.isDenied) {
            Swal.fire({
                icon: 'warning',
                title: 'thou shall perish for th mistake thou has made',
                showCancelButton: false,
                confirmButtonText: 'Perish'
            }).then((result) => {
                if (result.isConfirmed || result.isDenied) {
                    window.location.href = './TheGreatVoid'
                }
            })
        }
    })
}

//making variables that are used in functions
var file = document.getElementById("uploadInput");
var illegalStr = '<?'
var isFilterOpen = false;
var isUploadOpen = false;

//preset for unsupported files
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

//preset for squite a few errors that can happen on register/login
const registerFail = Swal.mixin({
    icon: 'error',
    title: 'An issue has occured',
    backdrop: `
    rgba(0,0,123,0.4)
    url("../media/img/nyanCat.gif")
    left top
    no-repeat
  `
})

//functions

//coppies link when you click on the share button
function shareOnload() {
    var fileShareLink = window.location.href;

    Swal.fire({
        icon: 'success',
        title: 'Link successfully coppied'
    }).then((result) => {
        if (result.isConfirmed || result.isDismissed === true) {
                navigator.clipboard.writeText(fileShareLink).then(() => {
                console.log(fileShareLink)
            })
        }
    })
}

//before submitting checks if there is a file selected, if not: throw error
$(document).on('submit', '#privateForm', function(e){
    if (file.files.length === 0) {
        e.preventDefault();
        Swal.fire({
            icon: 'error',
            title: 'No file selected',
            text: 'Please select a file before trying to upload air'
        });
    }
    //if there is no error, let the file submit
    else {
        return;
    }
})

//gives a notification after successfully uploading a file
function fileUploaded() {
    if (window.location.href.indexOf("uploadedFile") > -1) {
        console.log('hi');
        fileSubmit.fire({
            icon: 'success',
            title: 'File Successfully uploaded'
        })
    } 
}

//onloads that hide certain elements
function onLoad() {
    $(".hyperimg").hide();
}
function privateAndPublicOnload() {
    $(".uploadDiv").hide()
    $(".filterScreen").hide()
}

// index code
//shows an element when you click on a secret place
addGlobalEventListener('click', '.hypernewt', e => {
    window.location.href = './pages/hypersonic.php'
})

//plays audio when clicking on the toaster logo in about
addGlobalEventListener('click', '.Toasternewt', e => {
    var audio = new Audio("../media/sound/hyperGal.mp3");
    audio.play();

})


// #region private/public files

//display element on upload click
if (isFilterOpen === false) {
    $(".uploadButton").click(function () {
        isFilterOpen = true;
        $(".uploadDiv").show(1000)
    });
}

//display element on filter click
if (isUploadOpen === false) {
    $(".filterBtn").click(function () {
        isUploadOpen = true
        $(".filterScreen").show(1000)
    });
}

$(".closeUploadScreen").click(function () {
    isUploadOpen = false;
    $(".uploadDiv").hide(1000)
});

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

// #endregion

//checks if there is a password inside of the inputs on register
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

//general garbage

//function for adding event handlers 
function addGlobalEventListener(type, selector, callback) {
    document.addEventListener(type, e => {
        if (e.target.matches(selector)) callback(e);
    });
}