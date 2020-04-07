<script>
  class AudioController {
    constructor() {
      this.bgMusic = new Audio('./audio/levelmusic.mp3');
      this.slidingSound = new Audio('./audio/whack.mp3');
      this.bgMusic.volume = 0.5;
      this.bgMusic.loop = true;
    }
    startMusic() {
      // console.log("startMusic");
      this.bgMusic.play();
    }
    stopMusic() {
      // console.log("stop");

      this.bgMusic.pause();
      this.bgMusic.currentTime = 0;
    }
    sliding() {
      this.slidingSound.play();
    }
    stopsliding() {
      this.slidingSound.pause();
    }

  }
  class Mole {
    constructor(volume) {
      this.volume = volume;
      this.audioController = new AudioController();
      this.moles = document.querySelectorAll('.object');
      this.scoreBoard = document.querySelector('.controls .score span');
      this.start = document.querySelector('.text-center button[name="start"]');
      this.reset = document.querySelector('.text-center button[name="reset"]');
    }
    startGame() {
      // console.log(this.molxes);
      if (this.volume == true) {
        this.audioController.startMusic();
      } else {
        this.audioController.stopMusic();
      }

      this.playTime;
      this.interval;
      this.lastIndex;
      this.score = 0;
      this.playTime = 60;
      this.scoreBoard.textContent = 0;
      this.score = 0;
      this.start.classList.add('visible');
      clearInterval(this.interval);
      this.countdown();
      this.showMole();


    }
    showMole() {
      this.ra = Math.floor(Math.random() * 3) + 1;
      this.index = this.randomObject(this.moles.length);
      this.index1 = this.randomObject1(this.moles.length);
      this.index2 = this.randomObject2(this.moles.length);

      if (this.index == this.index1 || this.index == this.index2 || this.index1 == this.index2) {

        this.index = this.randomObject(this.moles.length);
        this.index1 = this.randomObject1(this.moles.length);
        this.index2 = this.randomObject2(this.moles.length);

      }
      this.mole = this.moles[this.index, this.index1];
      this.time = this.randomTime(1000, 1200);
      this.time1 = this.randomTime1(1800, 1900);
      this.time2 = this.randomTime2(1500, 1700);

      if (this.ra == 1) {
        document.querySelectorAll('.object')[this.index].classList.add('out');
        document.querySelectorAll('.object')[this.index].classList.remove('opt');

        document.querySelectorAll('.object')[this.index].classList.remove('click');
      } else if (this.ra == 2) {
        document.querySelectorAll('.object')[this.index].classList.add('out');
        document.querySelectorAll('.object')[this.index1].classList.add('out');
        document.querySelectorAll('.object')[this.index].classList.remove('opt');
        document.querySelectorAll('.object')[this.index1].classList.remove('opt');
        document.querySelectorAll('.object')[this.index].classList.remove('click');
        document.querySelectorAll('.object')[this.index1].classList.remove('click');
      } else if (this.ra == 3) {
        document.querySelectorAll('.object')[this.index].classList.add('out');
        document.querySelectorAll('.object')[this.index1].classList.add('out');
        document.querySelectorAll('.object')[this.index2].classList.add('out');

        document.querySelectorAll('.object')[this.index].classList.remove('opt');
        document.querySelectorAll('.object')[this.index1].classList.remove('opt');
        document.querySelectorAll('.object')[this.index2].classList.remove('opt');

        document.querySelectorAll('.object')[this.index].classList.remove('click');
        document.querySelectorAll('.object')[this.index1].classList.remove('click');
        document.querySelectorAll('.object')[this.index2].classList.remove('click');
      }
   
      setTimeout(() => {
        document.querySelectorAll('.object')[this.index].classList.remove('out');
        document.querySelectorAll('.object')[this.index].classList.remove('click');
        document.querySelectorAll('.object')[this.index].classList.remove('opt');
      }, this.time);
      setTimeout(() => {
        document.querySelectorAll('.object')[this.index1].classList.remove('out');
        document.querySelectorAll('.object')[this.index1].classList.remove('click');
        document.querySelectorAll('.object')[this.index1].classList.remove('opt');
      }, this.time1);
      setTimeout(() => {
        document.querySelectorAll('.object')[this.index2].classList.remove('out');
        document.querySelectorAll('.object')[this.index2].classList.remove('click');
        document.querySelectorAll('.object')[this.index2].classList.remove('opt');
      }, this.time2);

      setTimeout(() => {
        if (this.playTime > 0) setTimeout(() => {
          this.showMole();
        }, 1200)
      }, this.time2);
    }

    scorePoint(mole) {
      this.score++;
      if (this.volume == true) {
        this.audioController.sliding();
      } else {
        this.audioController.stopsliding();
      }


      if (this.score == 30) {
        this.playTime += 10;
        document.querySelector('.timer span').innerHTML = this.playTime;
        document.querySelector('#Bonus').innerHTML = "+10";
        document.querySelector('#Bonus').style.color = "green";
        setTimeout(() => {
          document.querySelector('#Bonus').innerHTML = "";
        }, 1000);
      } else if (this.score == 40) {
        this.playTime += 5;
        document.querySelector('.timer span').innerHTML = this.playTime;
        document.querySelector('#Bonus').innerHTML = "+5";
        document.querySelector('#Bonus').style.color = "green";
        setTimeout(() => {
          document.querySelector('#Bonus').innerHTML = "";
        }, 1000);
      }
      document.querySelector('.controls .score span').innerHTML = this.score;



      mole.classList.add('opa');
      mole.classList.remove('out');

      mole.classList.add('click');
      setTimeout(() => {
        mole.classList.remove('opa');
        mole.classList.remove('out');
      }, 500);

    }
    countdown() {
      this.interval = setInterval(() => {
        if (this.playTime < 10) {
          document.querySelector('.timer span').classList.add('flashit');
        } else {
          document.querySelector('.timer span').classList.remove('flashit');
        }
        if (this.playTime < 0) {
          this.start.classList.remove('visible');
          document.querySelector('.timer span').classList.remove('flashit');
          clearInterval(this.interval);
          this.endGame();
          return;
        }

        document.querySelector('.timer span').innerHTML = this.playTime;
        this.playTime--;
      }, 1000);
    }
    Reset() {
      this.playTime = 0;
      this.score = 0;
      document.querySelector('.timer span').innerHTML = this.playTime;
      document.querySelector('.controls .score span').innerHTML = this.score;
      this.start.classList.remove('visible');
      document.querySelector('.timer span').classList.remove('flashit');
      clearInterval(this.interval);
      return;
    }
    randomTime(min, max) {
      return Math.round(Math.random() * (max - min) + min);
    }
    randomTime1(min, max) {
      return Math.round(Math.random() * (max - min) + min);
    }
    randomTime2(min, max) {
      return Math.round(Math.random() * (max - min) + min);
    }
    randomObject(molesCount) {
      this.index = Math.floor(Math.random() * molesCount);
      this.mole = this.moles[this.index];
      if (this.index === this.lastIndex) return this.randomObject(molesCount);
      this.lastIndex = this.index;
      return this.index;
    }
    randomObject1(molesCount) {
      this.index1 = Math.floor(Math.random() * molesCount / 2);
      this.mole = this.moles[this.index1];
      if (this.index1 === this.lastIndex1) return this.randomObject(molesCount);
      this.lastIndex1 = this.index1;
      return this.index1;
    }
    randomObject2(molesCount) {
      this.index2 = Math.floor(Math.random() * molesCount / 2);
      this.mole = this.moles[this.index2];
      if (this.index2 === this.lastIndex2) return this.randomObject(molesCount);
      this.lastIndex2 = this.index2;
      return this.index2;
    }

    endGame() {
    
      
      this.audioController.stopMusic();
      document.getElementById('end').classList.add('visible');
      document.getElementById('score_totle').innerHTML = this.score;
      this.star1 = document.getElementById('star1');
      this.star2 = document.getElementById('star2');
      this.star3 = document.getElementById('star3');

      if (this.score > 35) {
        this.star1_60 = this.createstar_star_60();
        this.star2_100 = this.createstar_star_100();
        this.star3_60 = this.createstar_star_60();
        star1.appendChild(this.star1_60);
        star2.appendChild(this.star2_100);
        star3.appendChild(this.star3_60);
      } else if (this.score >= 30) {
        this.star1_1_60 = this.createstar_star_60();
        this.star2_1_100 = this.createstar_star_100();
        this.star3_1_60 = this.createstar_star_half_60();
        star1.appendChild(this.star1_1_60);
        star2.appendChild(this.star2_1_100);
        star3.appendChild(this.star3_1_60);
      } else if (this.score >= 25) {
        this.star1_2_60 = this.createstar_star_60();
        this.star2_2_100 = this.createstar_star_100();
        this.star3_2_60 = this.createstar_star_place_60();
        star1.appendChild(this.star1_2_60);
        star2.appendChild(this.star2_2_100);
        star3.appendChild(this.star3_2_60);
      } else if (this.score >= 20) {
        this.star1_3_60 = this.createstar_star_60();
        this.star2_3_100 = this.createstar_star_half_100();
        this.star3_3_60 = this.createstar_star_place_60();
        star1.appendChild(this.star1_3_60);
        star2.appendChild(this.star2_3_100);
        star3.appendChild(this.star3_3_60);
      } else if (this.score >= 15) {
        this.star1_4_60 = this.createstar_star_60();
        this.star2_4_100 = this.createstar_star_place_100();
        this.star3_4_60 = this.createstar_star_place_60();
        star1.appendChild(this.star1_4_60);
        star2.appendChild(this.star2_4_100);
        star3.appendChild(this.star3_4_60);
      } else if (this.score >= 10) {
        this.star1_5_60 = this.createstar_star_half_60();
        this.star2_5_100 = this.createstar_star_place_100();
        this.star3_5_60 = this.createstar_star_place_60();
        star1.appendChild(this.star1_5_60);
        star2.appendChild(this.star2_5_100);
        star3.appendChild(this.star3_5_60);
      } else if (this.score <= 5) {
        this.star1_6_60 = this.createstar_star_place_60();
        this.star2_6_100 = this.createstar_star_place_100();
        this.star3_6_60 = this.createstar_star_place_60();
        star1.appendChild(this.star1_6_60);
        star2.appendChild(this.star2_6_100);
        star3.appendChild(this.star3_6_60);
      }

    }
    createstar_star_60() {
      const star_60 = document.createElement('img');
      star_60.src = `./img/star.png`;
      star_60.width = `50`;
      return star_60;
    }
    createstar_star_100() {
      const star_100 = document.createElement('img');
      star_100.src = `./img/star.png`;
      star_100.width = `70`;
      return star_100;
    }
    createstar_star_half_60() {
      const star_half_60 = document.createElement('img');
      star_half_60.src = `./img/star_half.png`;
      star_half_60.width = `50`;
      return star_half_60;
    }
    createstar_star_half_100() {
      const star_half_100 = document.createElement('img');
      star_half_100.src = `./img/star_half.png`;
      star_half_100.width = `70`;
      return star_half_100;
    }
    createstar_star_place_60() {
      const star_place_60 = document.createElement('img');
      star_place_60.src = `./img/star_place.png`;
      star_place_60.width = `50`;
      return star_place_60;
    }
    createstar_star_place_100() {
      const star_place_100 = document.createElement('img');
      star_place_100.src = `./img/star_place.png`;
      star_place_100.width = `70`;
      return star_place_100;
    }
    getVolume() {
      return this.volume;
    }
  }



  if (document.readyState == 'loading') {
    document.addEventListener('DOMContentLoaded', ready);

  } else {

    ready();

  }

  function ready() {
    this.audioController = new AudioController();
    let objects = document.querySelectorAll('.object');
    let game = new Mole(volume);
    $("#start").click(function() {
      game.startGame();

    });
    // $("#reset").click(function() {
    //   game.Reset();
    //   game.audioController.stopMusic();
    // });
    $(".btn-restart").click(function() {
      location.replace("./main.php?Museum=" + <?php echo $get_museum ?> + "&Id=" + <?php echo $get_id ?> +"&Num=" + <?php echo $get_num ?> + "&volume=" + game.getVolume());
    });
    // $("#menu").click(function() {
    //   location.replace("./index.php?Museum=" + <?php echo $get_museum ?> + "&Id=" + <?php echo $get_id ?> + "&volume=" + game.getVolume());
    // });
    $(".btn-home").click(function() {
      location.replace("./index.php?Museum=" + <?php echo $get_museum ?> + "&Id=" + <?php echo $get_id ?> + "&volume=" + game.getVolume());
    });
    $(".volume_on").click(function() {
      var volume_on = document.getElementsByClassName('volume_on');
      var volume_off = document.getElementsByClassName('volume_off');

      for (var i = 0; i < volume_on.length; i++) {
        volume_on[i].classList.remove('visible');
        volume_off[i].classList.add('visible');
      }
      game.volume = false;
      return volume;
    });
    $(".volume_off").click(function() {
      var volume_on = document.getElementsByClassName('volume_on');
      var volume_off = document.getElementsByClassName('volume_off');

      for (var i = 0; i < volume_on.length; i++) {
        volume_on[i].classList.add('visible');
        volume_off[i].classList.remove('visible');
      }
      game.volume = true;
      return volume;
    });
    $("#music_start").click(function() {

      document.getElementById('music_stop').classList.add('visible');
      document.getElementById('music_start').classList.remove('visible');
      game.audioController.stopMusic();
    });
    $("#music_stop").click(function() {

      document.getElementById('music_start').classList.add('visible');
      document.getElementById('music_stop').classList.remove('visible');
      game.audioController.startMusic();
    });
    objects.forEach(object => {
      object.addEventListener('click', () => {

        game.scorePoint(object);

      });
    });
  }
</script>