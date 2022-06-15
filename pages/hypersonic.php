<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../script/index.js" defer></script>
    <script src="//cdn.jsdelivr.net/npm/phaser@3.55.2/dist/phaser.js"></script>
    <title>Document</title>
</head>
<body id="gameContainer" onload=onloadHypersonic()>
    
</body>
</html>

<script>
//setting the gameState so we can update sprites
const gameState = {}

//loading all of the image data to be drawn in create
function preload() {
    this.load.image('Player', '../media/img/hypersonic gal transparent.png')
}

//actually drawing all of the data loaded in preload to the canvas
function create() {
    gameState.player = this.add.sprite(200, 200, 'Player')

    //creating keyboard keys to make the player move
    gameState.keys = this.input.keyboard.createCursorKeys()

    //setting the player as interactive so the sprite can actually move
    gameState.player.setInteractive()
}

//function that updates the screen at 60 fps on default (its current setting)
function update() {
    //adding movement on arrow keys
    if (gameState.keys.left.isDown) {
        gameState.player.x -=4
    }
    else if (gameState.keys.left.isDown && gameState.keys.shift.isDown) {
        gameState.player.x -=6
    }
    if (gameState.keys.right.isDown) {
        gameState.player.x +=4
    }
    else if (gameState.keys.right.isDown && gameState.keys.shift.isDown) {
        gameState.player.x -=6
    }
    if (gameState.keys.up.isDown) {
        gameState.player.y -=4
    }
    else if (gameState.keys.up.isDown && gameState.keys.shift.isDown) {
        gameState.player.x -=6
    }
    if (gameState.keys.down.isDown) {
        gameState.player.y +=4
    }
    else if (gameState.keys.down.isDown && gameState.keys.shift.isDown) {
        gameState.player.x -=6
    }
}

    //game config for the canvas
    const config = {
        type: Phaser.AUTO,
        width: 1400,
        height: 1000,
        scene: {
            preload,
            create,
            update
        }   
    }

    //starting the game
const game = new Phaser.Game(config)
</script>