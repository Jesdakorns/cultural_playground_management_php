
<script>
    class AudioController {
        constructor() {
            this.bgMusic = new Audio('../audio/Carefree.wav');
            this.correctSound = new Audio('../audio/correctSound.mp3');
            this.slidingSound = new Audio('../audio/sliding.wav');
            this.victorySound = new Audio('../audio/victory.wav');
            this.bgMusic.volume = 0.5;
            this.correctSound.volume = 0.5;
            this.victorySound.volume = 0.5;
            this.bgMusic.loop = true;
        }
        startMusic() {
            this.bgMusic.play();
        }
        stopMusic() {
            this.bgMusic.pause();
            this.bgMusic.currentTime = 0;
        }
        startCorrect() {
            this.correctSound.play();
        }
        stopCorrect() {
            this.correctSound.pause();
        }
        startSliding() {
            this.slidingSound.play();
        }
        stopSliding() {
            this.slidingSound.pause();
        }
        startVictory() {
            this.stopMusic()
            this.victorySound.play();
        }
        stopVictory() {

            this.victorySound.pause();
        }
    }
    class CollectObjects {
        constructor(volume) {
            this.audioController = new AudioController();
            this.score = 0;
            this.highScore = 0;
            this.time = 60;
            this.timer;
            this.IsPlaying = false;
            this.timeBoard = document.getElementById('time');
            this.scoreBoard = document.getElementById('score');
            this.btnStart = document.getElementById('btn');
            // this.object0= document.getElementById('object10');
            // var scene = document.querySelectorAll('.object');
            this.volume = volume;
            this.random1;
            // this.getrandom;
        }
        starGame() {
            if (this.volume == true) {
                this.audioController.startMusic();
            } else {
                this.audioController.stopMusic();
            }
            var divs = document.querySelectorAll('.object');
            this.btnStart.disabled = "disabled";
            this.IsPlaying = true;
            this.renderScore();
            this.timer = setInterval(() => this.countDown(), 1000);
            this.getrandom;
            this.down = setInterval(function() {
                this.random = Math.floor(Math.random() * 8);
                if (window.matchMedia("(min-width: 1441px)").matches) {
                    // console.log("labtop 17 นอน");
                    divs[this.random].setAttribute('data-top', divs[this.random].style.top);
                    divs[this.random].style.top = "900px";

                } else if (window.matchMedia("(min-width: 1366px) and (max-width: 1440px)").matches) {
                    // console.log("ipad pro,labtop 15 นอน");
                    divs[this.random].setAttribute('data-top', divs[this.random].style.top);
                    divs[this.random].style.top = "700px";
                } else if (window.matchMedia("(min-width: 1025px) and (max-width: 1365px)").matches) {
                    // console.log("labtop 13");
                    divs[this.random].setAttribute('data-top', divs[this.random].style.top);
                    divs[this.random].style.top = "700px";
                } else if (window.matchMedia("(orientation: landscape)").matches) {
                    // console.log("นอน");
                    divs[this.random].setAttribute('data-top', divs[this.random].style.top);
                    divs[this.random].style.top = "500px";
                } else if (window.matchMedia("(min-width: 802px) and (max-width: 1024px)").matches) {
                    // console.log("ipad pro ตั้ง");
                    divs[this.random].setAttribute('data-top', divs[this.random].style.top);
                    divs[this.random].style.top = "1100px";
                } else if (window.matchMedia("(min-width: 768px) and (max-width: 802px)").matches) {
                    // console.log("ipad ตั้ง");
                    divs[this.random].setAttribute('data-top', divs[this.random].style.top);
                    divs[this.random].style.top = "900px";
                } else {
                    divs[this.random].setAttribute('data-top', divs[this.random].style.top);
                    divs[this.random].style.top = "600px";
                }
                // divs[this.random].setAttribute('data-top', divs[this.random].style.top);
                // divs[this.random].style.top = "500px";
                // this.random1 = this.random;
                // return this.random1;
                // console.log("randomstart[", this.random,"]");
                // console.log("random1", this.random);
            }, 1000);
            this.start = setInterval(() => this.countDownObject(), 3000);

            // console.log(this.random1);


        }
        countDownObject() {

            var divs = document.querySelectorAll('.object');


            setTimeout(function() {
                this.random1 = Math.floor(Math.random() * 7);
                // console.log("random[", this.random1,"]");
                // divs[this.random1].style.display = 'none';

                divs[this.random1].style.top = divs[this.random1].getAttribute('data-top');
                setTimeout(function() {
                    if (window.matchMedia("(min-width: 1441px)").matches) {
                        // console.log("labtop 17 นอน");
                        divs[this.random].setAttribute('data-top', divs[this.random].style.top);
                        divs[this.random].style.top = "-300px";

                    } else if (window.matchMedia("(min-width: 802px) and (max-width: 1024px)").matches) {
                        // console.log("ipad pro ตั้ง");
                        divs[this.random1].style.display = 'inline-block';
                        divs[this.random1].style.top = '-300px';
                    } else {
                        divs[this.random1].style.display = 'inline-block';
                        divs[this.random1].style.top = '-200px';
                    }

                }, 1000);
            }, 700);
        }
        countDown() {
            // console.log(this.time);

            this.time -= 1;
            document.getElementById('time').innerHTML = this.time;
            if (this.time == 0) {
                clearInterval(this.timer);
                // console.log("endGame");
                this.endGame();

            }
        }
        endGame() {
           
           clearInterval(this.start);

            this.audioController.stopMusic();
            if (this.volume == true) {
                this.audioController.startVictory();
            } else {
                this.audioController.stopVictory();
            }
            this.IsPlaying = false;
            document.getElementById('end').classList.add('visible');
            document.getElementById('score_conclude').innerHTML = this.score;
            // alert("You Score is: " + this.score);
            this.score = 0;
            this.time = 30;
            this.btnStart.removeAttribute('disabled');
        }
        fallDown(object, index) {
            if (!(this.IsPlaying && object instanceof HTMLElement)) {
                return;
            }



            this.score++;

            this.renderScore();

            this.hideFallenObject(object);
            console.log(data_title[index]);

            document.getElementById('title').innerHTML = data_title[index];
        }
        hideFallenObject(object) {
            setTimeout(function() {
                object.style.display = 'none';

                object.style.top = object.getAttribute('data-top');
                setTimeout(function() {
                    if (window.matchMedia("(min-width: 1441px)").matches) {
                        // console.log("labtop 17 นอน");
                        object.style.display = 'inline-block';
                        object.style.top = '-300px';

                    }else if (window.matchMedia("(min-width: 802px) and (max-width: 1024px)").matches) {
                        // console.log("ipad pro ตั้ง");
                        object.style.display = 'inline-block';
                        object.style.top = '-300px';
                    } else {
                        object.style.display = 'inline-block';
                        object.style.top = '-200px';
                    }

                }, 500);
            }, 100);
        }
        renderScore() {
            // console.log(this.score);

            this.scoreBoard.innerHTML = this.score;
            if (this.score > this.highScore) {
                this.highScore = this.score;
                // document.getElementById('high').innerHTML = this.highScore;
            }
        }
        getVolume() {
            return this.volume;
        }
    }
    if (document.ReadyState == 'loading') {
        document.addEventListener('DOMContentLoaded', ready);
    } else {
        Ready();
    }

    function Ready() {
        let volume = <?php echo $get_volume ?>;
        let Game = new CollectObjects(volume);
        let cards = Array.from(document.getElementsByClassName('object'));
        var index;
        $("#btn").click(function() {
            Game.starGame();
        });
        $('img').click(function() {
            index = $(this).index();
            // console.log(index);
        });
        $("#home").click(function() {
            location.replace("../index.php?Museum=" + <?php echo $get_museum ?> + "&Id=" + <?php echo $get_id ?> + "&volume=" + Game.getVolume());
        });
        $("#music_start").click(function() {
            document.getElementById('music_stop').classList.add('visible');
            document.getElementById('music_start').classList.remove('visible');
            Game.audioController.stopMusic();
        });
        $("#music_stop").click(function() {
            document.getElementById('music_start').classList.add('visible');
            document.getElementById('music_stop').classList.remove('visible');
            Game.audioController.startMusic();
        });
        $(".volume_on").click(function() {
            var volume_on = document.getElementsByClassName('volume_on');
            var volume_off = document.getElementsByClassName('volume_off');

            for (var i = 0; i < volume_on.length; i++) {
                volume_on[i].classList.remove('visible');
                volume_off[i].classList.add('visible');
            }
            Game.volume = false;
            return volume;
        });
        $(".volume_off").click(function() {
            var volume_on = document.getElementsByClassName('volume_on');
            var volume_off = document.getElementsByClassName('volume_off');

            for (var i = 0; i < volume_on.length; i++) {
                volume_on[i].classList.add('visible');
                volume_off[i].classList.remove('visible');
            }
            Game.volume = true;

            return volume;
        });
        $("#menu").click(function() {
            location.replace("../index.php?Museum=" + <?php echo $get_museum ?> + "&Id=" + <?php echo $get_id ?> + "&volume=" + Game.getVolume());
        });
        $("#restart").click(function() {
            location.replace("index.php?Museum=" + <?php echo $get_museum ?> + "&Id=" + <?php echo $get_id ?> + "&volume=" + Game.getVolume());
        });
        cards.forEach(card => { // ทำงานตอนกด ไพ่
            card.addEventListener('click', () => {

                Game.fallDown(card, index);

            });
        });

    }
</script>