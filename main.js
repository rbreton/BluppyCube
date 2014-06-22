var game = new Phaser.Game(400, 490, Phaser.AUTO, 'game_div');

var main_state = {
    preload: function() { 
        this.game.stage.backgroundColor = '#71c5cf';
        this.game.load.image('bird', 'assets/bird.png');  
        this.game.load.image('pipe', 'assets/pipe.png');      
        this.game.load.audio('jump', 'assets/jump.wav');
    },
    create: function() { 
        var space_key = this.game.input.keyboard.addKey(Phaser.Keyboard.SPACEBAR);
        space_key.onDown.add(this.jump, this); 

        this.pipes = game.add.group();
        this.pipes.createMultiple(20, 'pipe');  
        this.timer = this.game.time.events.loop(1500, this.add_row_of_pipes, this);           

        this.bird = this.game.add.sprite(100, 245, 'bird');
        this.bird.body.gravity.y = 1000; 
        this.bird.anchor.setTo(-0.2, 0.5);
               
        this.score = 0;
        var style = { font: "30px Arial", fill: "#ffffff" };
        this.label_score = this.game.add.text(20, 20, "0", style); 

        this.jump_sound = this.game.add.audio('jump');
    },
    update: function() {
        if (this.bird.inWorld == false)
            this.restart_game(); 
        if (this.bird.angle < 20)
            this.bird.angle += 1;
        this.game.physics.overlap(this.bird, this.pipes, this.hit_pipe, null, this);      
    },
    jump: function() {
        if (this.bird.alive == false)
            return; 
        this.bird.body.velocity.y = -350;

        this.game.add.tween(this.bird).to({angle: -20}, 100).start();

        this.jump_sound.play();
    },
    hit_pipe: function() {
        if (this.bird.alive == false)
            return;

        this.bird.alive = false;
        this.game.time.events.remove(this.timer);
        this.pipes.forEachAlive(function(p){
            p.body.velocity.x = 0;
        }, this);
    },
    restart_game: function() {
        this.add_score_to_db();
        this.game.time.events.remove(this.timer);
        
    },
    add_one_pipe: function(x, y) {
        var pipe = this.pipes.getFirstDead();
        pipe.reset(x, y);
        pipe.body.velocity.x = -200; 
        pipe.outOfBoundsKill = true;
    },
    add_row_of_pipes: function() {
        var hole = Math.floor(Math.random()*5)+1;
        
        for (var i = 0; i < 8; i++)
            if (i != hole && i != hole +1) 
                this.add_one_pipe(400, i*60+10);   
    
        this.score += 1;
        this.label_score.content = this.score;  
    },
    add_score_to_db: function() {
        xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function() {
            if (xmlhttp.readyState==4 && xmlhttp.status==200) {
              document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","setScore.php?user=bretonr"+this.score+"&score="+this.score, true);
        xmlhttp.send();
        this.game.state.start('main');
    },
};

game.state.add('main', main_state);  
game.state.start('main'); 
/*
function showUser(str) {
  if (str=="") {
    document.getElementById("txtHint").innerHTML="";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","getuser.php?q="+str,true);
  xmlhttp.send();
}*/