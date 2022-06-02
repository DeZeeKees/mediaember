// toms playground :D
//general:

var isFilterOpen = false;
var isUploadOpen = false;

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

$(".closeFilter").click(function () {
    isFilterOpen = false;
    $(".filterScreen").hide(1000) 
});

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
    for (var i = 0; i < this.files.length; i++) {
        var file = this.files[i];

        if (file.name.endsWith(".php") || file.name.endsWith(".exe") || file.name.endsWith(".js")) {
            hasInvalidFiles = true;
        }
    }

    if (hasInvalidFiles) {
        fileInput.value = "";
        alert("Unsupported file selected.");
    }
});
// upload cancel close thing
// #endregion


//function for adding event handlers 
function addGlobalEventListener(type, selector, callback) {
    document.addEventListener(type, e => {
        if (e.target.matches(selector)) callback(e);
    });
}