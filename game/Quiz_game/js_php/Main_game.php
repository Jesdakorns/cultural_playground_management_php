<?php include('./js_php/Include_data_main.php'); ?>
<script>
    class AudioController {
        constructor() {
            this.bgMusic = new Audio('./audio/Carefree.wav');
            this.correctSound = new Audio('./audio/correctSound.mp3');
            this.slidingSound = new Audio('./audio/sliding.wav');
            this.victorySound = new Audio('./audio/victory.wav');
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
    class Quiz {
        constructor(quiz, timeGauge, volume) {
            this.audioController = new AudioController();
            this.quiz = quiz;
            this.timeGauge = timeGauge;
            this.questions = [<?php
                                foreach ($obj as $obj1) {
                                    for ($i = 0; $i <  $count; $i++) {
                                        echo "{title:'" . $obj1[$i]->title . "',\n";
                                        echo "image:'" . $obj1[$i]->image . "'},";
                                    }
                                }
                                ?>]
            this.lastQuestion = this.questions.length - 1;
            this.volume = volume;
        }
        startQuiz() {


            this.runningQuestion = 0;
            this.countQuestion = 1;
            this.count = 2500;
            this.questionTime = 2500;
            this.gaugeWidth = 100;
            this.gaugeUnit = this.gaugeWidth / this.questionTime;
            this.timeReduction = 0;
            this.score = 0;
            this.scorePerCent = 0;
            this.arrayList = [];
            this.arrayListCount = 0;

            this.countdown = setInterval(() => this.renderCounter(), 10);
            this.renderQuestion();

        }
        renderQuestion() {
            this.random_ans = Math.floor(Math.random() * 2) + 1; // สุ่มคำตอบ
            this.random_Question = Math.floor(Math.random() * this.lastQuestion); // สุ่มคำตอบ
            document.getElementById("results").src = "";




            console.log("ใหม่ runningQuestion: " + this.runningQuestion + "\n" + "random_Question: " + this.random_Question);
            if (this.questions[this.runningQuestion].title == this.questions[this.random_Question].title) {
                console.log(this.questions[this.runningQuestion].title);
                console.log(this.questions[this.random_Question].title);
                do {
                    this.random_Question = Math.floor(Math.random() * this.lastQuestion);
                } while (this.questions[this.runningQuestion].title == this.questions[this.random_Question].title);
                console.log(this.questions[this.runningQuestion].title);
                console.log(this.questions[this.random_Question].title);
            }
            this.q = this.questions[this.runningQuestion];
            this.q1 = this.questions[this.random_Question];
            document.getElementById("topic").innerHTML = "<h2 class='text text-center'>ข้อที่ " + this.countQuestion + "/" + `${this.lastQuestion+1}` + "</h2>";
            document.getElementById("qImage").innerHTML = "<img class='size_img' src=" + this.q.image + ">";
            if (this.random_ans == 1) {
                document.getElementById("ans" + this.random_ans).innerHTML = "<a class='button ' href='#' id='btn" + this.random_ans + "'>" + this.q.title + "</a>";
                document.getElementById("ans" + this.random_ans * 2).innerHTML = "<a class='button ' href='#' id='btn" + this.random_ans * 2 + "'>" + this.q1.title + "</a>";
            } else if (this.random_ans == 2) {
                document.getElementById("ans" + this.random_ans).innerHTML = "<a class='button ' href='#' id='btn" + this.random_ans + "'>" + this.q.title + "</a>";
                document.getElementById("ans" + this.random_ans / 2).innerHTML = "<a class='button ' href='#' id='btn" + this.random_ans / 2 + "'>" + this.q1.title + "</Button>";
            }

        }
        renderCounter() {
            if (this.count < 0) {
                this.arrayList[this.arrayListCount] = this.questions[this.runningQuestion];
                this.arrayListCount++;
                this.count = 2500;

                if (this.runningQuestion < this.lastQuestion) {
                    this.runningQuestion++;
                    this.countQuestion++;
                    this.renderQuestion();
                } else {
                    clearInterval(this.countdown);
                    this.scoreRender();
                }
            } else {
                this.timeReduction = this.count * this.gaugeUnit;
                if (this.timeReduction < 10) {
                    timeGauge.style.width = this.timeReduction + "%";
                    timeGauge.style.backgroundColor = '#ff0000';
                } else if (this.timeReduction < 12) {
                    timeGauge.style.width = this.timeReduction + "%";
                    timeGauge.style.backgroundColor = '#ff3000';
                } else if (this.timeReduction < 14) {
                    timeGauge.style.width = this.timeReduction + "%";
                    timeGauge.style.backgroundColor = '#ff3c00';
                } else if (this.timeReduction < 16) {
                    timeGauge.style.width = this.timeReduction + "%";
                    timeGauge.style.backgroundColor = '#ff4800';
                } else if (this.timeReduction < 18) {
                    timeGauge.style.width = this.timeReduction + "%";
                    timeGauge.style.backgroundColor = '#ff4e00';
                } else if (this.timeReduction < 20) {
                    timeGauge.style.width = this.timeReduction + "%";
                    timeGauge.style.backgroundColor = '#ff5a00';
                } else if (this.timeReduction < 22) {
                    timeGauge.style.width = this.timeReduction + "%";
                    timeGauge.style.backgroundColor = '#ff6c00';
                } else if (this.timeReduction < 24) {
                    timeGauge.style.width = this.timeReduction + "%";
                    timeGauge.style.backgroundColor = '#ff7200';
                } else if (this.timeReduction < 26) {
                    timeGauge.style.width = this.timeReduction + "%";
                    timeGauge.style.backgroundColor = '#ff7800';
                } else if (this.timeReduction < 28) {
                    timeGauge.style.width = this.timeReduction + "%";
                    timeGauge.style.backgroundColor = '#ff7e00';
                } else if (this.timeReduction < 30) {
                    timeGauge.style.width = this.timeReduction + "%";
                    timeGauge.style.backgroundColor = '#ff8400';
                } else if (this.timeReduction < 32) {
                    timeGauge.style.width = this.timeReduction + "%";
                    timeGauge.style.backgroundColor = '#ff9000';
                } else if (this.timeReduction < 34) {
                    timeGauge.style.width = this.timeReduction + "%";
                    timeGauge.style.backgroundColor = '#ff9600';
                } else if (this.timeReduction < 36) {
                    timeGauge.style.width = this.timeReduction + "%";
                    timeGauge.style.backgroundColor = '#ff9c00';
                } else if (this.timeReduction < 38) {
                    timeGauge.style.width = this.timeReduction + "%";
                    timeGauge.style.backgroundColor = '#ffa200';
                } else if (this.timeReduction < 40) {
                    timeGauge.style.width = this.timeReduction + "%";
                    timeGauge.style.backgroundColor = '#ffa800';
                } else if (this.timeReduction < 42) {
                    timeGauge.style.width = this.timeReduction + "%";
                    timeGauge.style.backgroundColor = '#ffae00';
                } else if (this.timeReduction < 44) {
                    timeGauge.style.width = this.timeReduction + "%";
                    timeGauge.style.backgroundColor = '#ffb400';
                } else if (this.timeReduction < 46) {
                    timeGauge.style.width = this.timeReduction + "%";
                    timeGauge.style.backgroundColor = '#ffba00';
                } else if (this.timeReduction < 48) {
                    timeGauge.style.width = this.timeReduction + "%";
                    timeGauge.style.backgroundColor = '#ffc000';
                } else if (this.timeReduction < 50) {
                    timeGauge.style.width = this.timeReduction + "%";
                    timeGauge.style.backgroundColor = '#ffc600';
                } else if (this.timeReduction < 52) {
                    timeGauge.style.width = this.timeReduction + "%";
                    timeGauge.style.backgroundColor = '#ffcc00';
                } else if (this.timeReduction < 54) {
                    timeGauge.style.width = this.timeReduction + "%";
                    timeGauge.style.backgroundColor = '#ffd200';
                } else if (this.timeReduction < 56) {
                    timeGauge.style.width = this.timeReduction + "%";
                    timeGauge.style.backgroundColor = '#ffde00';
                } else if (this.timeReduction < 58) {
                    timeGauge.style.width = this.timeReduction + "%";
                    timeGauge.style.backgroundColor = '#ffea00';
                } else if (this.timeReduction < 60) {
                    timeGauge.style.width = this.timeReduction + "%";
                    timeGauge.style.backgroundColor = '#fff600';
                } else if (this.timeReduction < 62) {
                    timeGauge.style.width = this.timeReduction + "%";
                    timeGauge.style.backgroundColor = '#f6ff00';
                } else if (this.timeReduction < 64) {
                    timeGauge.style.width = this.timeReduction + "%";
                    timeGauge.style.backgroundColor = '#e4ff00';
                } else if (this.timeReduction < 66) {
                    timeGauge.style.width = this.timeReduction + "%";
                    timeGauge.style.backgroundColor = '#ccff00';
                } else if (this.timeReduction < 68) {
                    timeGauge.style.width = this.timeReduction + "%";
                    timeGauge.style.backgroundColor = '#baff00';
                } else if (this.timeReduction < 70) {
                    timeGauge.style.width = this.timeReduction + "%";
                    timeGauge.style.backgroundColor = '#aeff00';
                } else if (this.timeReduction < 72) {
                    timeGauge.style.width = this.timeReduction + "%";
                    timeGauge.style.backgroundColor = '#96ff00';
                } else if (this.timeReduction < 74) {
                    timeGauge.style.width = this.timeReduction + "%";
                    timeGauge.style.backgroundColor = '#7eff00';
                } else if (this.timeReduction < 76) {
                    timeGauge.style.width = this.timeReduction + "%";
                    timeGauge.style.backgroundColor = '#5aee01';
                } else if (this.timeReduction < 78) {
                    timeGauge.style.width = this.timeReduction + "%";
                    timeGauge.style.backgroundColor = '#1ff203';
                } else if (this.timeReduction < 88) {
                    timeGauge.style.width = this.timeReduction + "%";
                    timeGauge.style.backgroundColor = '#';
                } else {
                    timeGauge.style.width = this.timeReduction + "%";
                    timeGauge.style.backgroundColor = '#0bef00';
                }
                this.count--;
            }
            // console.log(this.timeReduction);


        }

        scoreRender() {
            // $(document).ready(function() {
            //     console.log("sddf");

            //     $('#exampleModal1').trigger('click');
            // });
            if (this.volume == true) {
                this.audioController.startVictory();
            } else {
                this.audioController.stopVictory();
            }
            const star1 = document.getElementById('star1');
            const star2 = document.getElementById('star2');
            const star3 = document.getElementById('star3');
            // console.log("Win");
            this.scorePerCent = Math.round(100 * this.score / this.questions.length);
            this.sumScore = this.score;
            // console.log("this.scorePerCent:", this.scorePerCent);
            document.getElementById('end').classList.add('visible');
            if (this.scorePerCent >= 80) {
                var star1_60 = this.createstar_star_60();
                var star2_100 = this.createstar_star_100();
                var star3_60 = this.createstar_star_60();
                star1.appendChild(star1_60);
                star2.appendChild(star2_100);
                star3.appendChild(star3_60);
            } else if (this.scorePerCent >= 70) {
                var star1_60 = this.createstar_star_60();
                var star2_100 = this.createstar_star_100();
                var star3_60 = this.createstar_star_half_60();
                star1.appendChild(star1_60);
                star2.appendChild(star2_100);
                star3.appendChild(star3_60);
            } else if (this.scorePerCent >= 60) {
                var star1_60 = this.createstar_star_60();
                var star2_100 = this.createstar_star_100();
                var star3_60 = this.createstar_star_place_60();
                star1.appendChild(star1_60);
                star2.appendChild(star2_100);
                star3.appendChild(star3_60);
            } else if (this.scorePerCent >= 50) {
                var star1_60 = this.createstar_star_60();
                var star2_100 = this.createstar_star_half_100();
                var star3_60 = this.createstar_star_place_60();
                star1.appendChild(star1_60);
                star2.appendChild(star2_100);
                star3.appendChild(star3_60);
            } else if (this.scorePerCent >= 40) {
                var star1_60 = this.createstar_star_60();
                var star2_100 = this.createstar_star_place_100();
                var star3_60 = this.createstar_star_place_60();
                star1.appendChild(star1_60);
                star2.appendChild(star2_100);
                star3.appendChild(star3_60);
            } else if (this.scorePerCent >= 30) {
                var star1_60 = this.createstar_star_half_60();
                var star2_100 = this.createstar_star_place_100();
                var star3_60 = this.createstar_star_place_60();
                star1.appendChild(star1_60);
                star2.appendChild(star2_100);
                star3.appendChild(star3_60);
            } else if (this.scorePerCent < 30) {
                var star1_60 = this.createstar_star_place_60();
                var star2_100 = this.createstar_star_place_100();
                var star3_60 = this.createstar_star_place_60();
                star1.appendChild(star1_60);
                star2.appendChild(star2_100);
                star3.appendChild(star3_60);
            }
            document.getElementById('total_scorePerCent').innerHTML = this.sumScore + "/" + `${this.lastQuestion+1}`;

            this.errorList();


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
            star_100.width = `60`;
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
            star_half_100.width = `60`;
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
            star_place_100.width = `60`;
            return star_place_100;
        }
        clickAns(answer) {
            document.getElementById("overlay").classList.add('visible');
            var count_results = 0;
            // if (this.volume == true) {
            //     this.audioController.startSliding();
            // } else {
            //     this.audioController.stopSliding();
            // }
            // console.log("click:", answer);
            if (answer == this.questions[this.runningQuestion].title) {
                this.arrayList[this.arrayListCount] = this.questions[this.runningQuestion];

                this.arrayListCount++;
                if (this.volume == true) {
                    this.audioController.startCorrect();
                } else {
                    this.audioController.stopCorrect();
                }
                this.score++;
                // console.log(this.random_ans);
                if (this.random_ans == 1) {
                    document.getElementById("btn" + this.random_ans).style.background = '#00c500';
                    document.getElementById("btn" + this.random_ans).style.color = '#ffff';
                    document.getElementById("btn" + this.random_ans).style.fontSize = '2rem';
                    document.getElementById("btn" + this.random_ans).innerHTML = "<div class='row align-items-center'><div class='col-12 align-self-center'>" + this.q.title + "</div></div>";
                } else if (this.random_ans == 2) {
                    document.getElementById("btn" + this.random_ans).style.background = '#00c500';
                    document.getElementById("btn" + this.random_ans).style.color = '#ffff';
                    document.getElementById("btn" + this.random_ans).style.fontSize = '2rem';
                    document.getElementById("btn" + this.random_ans).innerHTML = "<div class='row align-items-center'><div class='col-12 align-self-center' >" + this.q.title + "</div></div>";
                }
            } else {
                if (this.volume == true) {
                    this.audioController.startSliding();
                } else {
                    this.audioController.stopSliding();
                }
                this.arrayList[this.arrayListCount] = this.questions[this.random_Question];

                this.arrayListCount++;
                // console.log(this.random_ans);
                if (this.random_ans == 1) {
                    document.getElementById("btn" + this.random_ans * 2).style.background = '#ff0000';
                    document.getElementById("btn" + this.random_ans * 2).style.color = '#FFFF';
                    document.getElementById("btn" + this.random_ans * 2).style.fontSize = '2rem';
                    document.getElementById("btn" + this.random_ans * 2).innerHTML = "<div class='row align-items-center'><div class='col-12 align-self-center' >" + this.q1.title + "</div></div>";
                } else if (this.random_ans == 2) {
                    document.getElementById("btn" + this.random_ans / 2).style.background = '#ff0000';
                    document.getElementById("btn" + this.random_ans / 2).style.color = '#FFFF';
                    document.getElementById("btn" + this.random_ans / 2).style.fontSize = '2rem';
                    document.getElementById("btn" + this.random_ans / 2).innerHTML = "<div class='row align-items-center'><div class='col-12 align-self-center' >" + this.q1.title + "</div></div>";
                }

            }
            console.log(this.arrayList);
            clearInterval(this.countdown);
            this.count = 2500;

            setTimeout(() => {
                this.countdown = setInterval(() => this.renderCounter(), 10);
                document.getElementById("overlay").classList.remove('visible');
                if (this.runningQuestion < this.lastQuestion) {
                    this.runningQuestion++;
                    this.countQuestion++;

                    this.renderQuestion();
                } else {
                    clearInterval(this.countdown);
                    this.scoreRender();
                }
            }, 1000);
        }
        errorList() {
            this.errorListMain = document.getElementById("main_list");
            this.errorListImage = document.getElementById("error_img");
            this.errorListTitle = document.getElementById("error_ans");

            for (var i = 0; i < this.arrayListCount; i++) {

                this.div = this.createErrorListDiv();
                this.col_5 = this.createErrorListCol_5();
                this.col_7 = this.createErrorListCol_7();
                this.img = this.createErrorListImage(i);
                if (this.arrayList[i].title == this.questions[i].title) {
                    this.title = this.createListTitle(i);
                    this.col_7.appendChild(this.title);
                } else {
                    this.title = this.createErrorListTitle(i);
                    this.title1 = this.creategreenListTitle(i);
                    this.col_7.appendChild(this.title);
                    this.col_7.appendChild(this.title1);
                }
                this.errorListMain.appendChild(this.div);
                this.div.appendChild(this.col_5);
                this.div.appendChild(this.col_7);
                this.col_5.appendChild(this.img);
                
                
            }


        }
        createErrorListTitle(i) {
            const title = document.createElement('h3');
            title.innerHTML = "<div class='row align-items-center'><div class='col-1 align-self-center'><i class='material-icons'>close</i></div><div class='col-10'>"+this.arrayList[i].title+"</div>";
            title.style.color = 'red';
            return title;
        }
        createListTitle(i) {
            const title = document.createElement('h3');
            title.innerHTML = "<div class='row align-items-center'><div class='col-1 align-self-center'><i class='material-icons'>done</i></div><div class='col-10'>"+this.arrayList[i].title+"</div>";
            title.style.color = 'green';
            return title;
        }
        creategreenListTitle(i) {
            const title1 = document.createElement('h5');
            title1.innerHTML = 'เฉลย: '+this.questions[i].title;
            title1.style.color = '';
            return title1;
        }
        createErrorListImage(i) {
            const img = document.createElement('img');
            img.src = this.questions[i].image;
            img.style.width = '100%';
            img.style.padding = '5px';
            return img;
        }
        createErrorListDiv() {
            const div = document.createElement('div');
            div.classList = "row align-items-center";
            div.style.borderBottom = '1px solid #e2e2e2';
            div.style.padding = '10px';
            return div;
        }
        createErrorListCol_5() {
            const div = document.createElement('div');
            div.classList = "col-4";
            return div;
        }
        createErrorListCol_7() {
            const div = document.createElement('div');
            div.classList = "col-8";
            return div;
        }
        getVolume() {
            return this.volume;
        }
    }

    function Ready() {
        const quiz = document.getElementById("count");
        const timeGauge = document.getElementById("timeGauge");
        let volume = <?php echo $get_volume ?>;
        let startQuiz = new Quiz(quiz, timeGauge, volume);
        startQuiz.startQuiz();
        $("#ans1").click(function() {
            var answer = $(this).text();
            startQuiz.clickAns(answer);
        });
        $("#ans2").click(function() {
            var answer = $(this).text();
            startQuiz.clickAns(answer);
        });
        $("#home").click(function() {
            location.replace("./index.php?Id=" + <?php echo $get_id ?> + "&volume=" + startQuiz.getVolume());
        });
        $("#music_start").click(function() {
            document.getElementById('music_stop').classList.add('visible');
            document.getElementById('music_start').classList.remove('visible');
            startQuiz.audioController.stopMusic();
        });
        $("#music_stop").click(function() {
            document.getElementById('music_start').classList.add('visible');
            document.getElementById('music_stop').classList.remove('visible');
            startQuiz.audioController.startMusic();
        });
        $(".volume_on").click(function() {
            var volume_on = document.getElementsByClassName('volume_on');
            var volume_off = document.getElementsByClassName('volume_off');

            for (var i = 0; i < volume_on.length; i++) {
                volume_on[i].classList.remove('visible');
                volume_off[i].classList.add('visible');
            }
            startQuiz.volume = false;
            return volume;
        });
        $(".volume_off").click(function() {
            var volume_on = document.getElementsByClassName('volume_on');
            var volume_off = document.getElementsByClassName('volume_off');

            for (var i = 0; i < volume_on.length; i++) {
                volume_on[i].classList.add('visible');
                volume_off[i].classList.remove('visible');
            }
            startQuiz.volume = true;

            return volume;
        });
        $("#menu").click(function() {
            location.replace("./index.php?Id=" + <?php echo $get_id ?> + "&volume=" + startQuiz.getVolume());
        });
        $("#restart").click(function() {
            location.replace("./main.php?Id=" + <?php echo $get_id ?> + "&volume=" + startQuiz.getVolume());
        });
    }
    if (document.ReadyState == 'loading') {
        document.addEventListener('DOMContentLoaded', ready);
    } else {
        Ready();
    }
</script>