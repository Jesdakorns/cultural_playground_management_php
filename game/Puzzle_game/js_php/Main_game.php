<?php include('./js_php/Include_data_main.php'); ?>
<script>
  /////////////////////////// Cell ///////////////////////////////
  class AudioController {
    constructor() {
      this.bgMusic = new Audio('./audio/Carefree.wav');
      this.slidingSound = new Audio('./audio/sliding.wav');
      this.victorySound = new Audio('./audio/victory.wav');
      this.bgMusic.volume = 0.5;
      this.victorySound.volume = 0.5;
      this.bgMusic.loop = true;
    }
    startMusic() {
      console.log("startMusic");
      this.bgMusic.play();
    }
    stopMusic() {
      console.log("stop");

      this.bgMusic.pause();
      this.bgMusic.currentTime = 0;
    }
    sliding() {
      this.slidingSound.play();
    }
    stopsliding() {
      this.slidingSound.pause();
    }
    victory() {
      this.stopMusic()
      this.victorySound.play();
    }
    stopvictory() {

      this.victorySound.pause();
    }
  }
  class Cell {
    constructor(puzzle, ind) {
      // console.log("-",puzzle);

      this.index = ind;
      this.puzzle = puzzle;
      this.isEmpty = false;

      this.width = this.puzzle.width / this.puzzle.dimmension;
      this.height = this.puzzle.height / this.puzzle.dimmension;

      this.el = this.createDiv();
      puzzle.el.appendChild(this.el);
      if (this.index === this.puzzle.dimmension * this.puzzle.dimmension - 1) {
        this.isEmpty = true;
        return;
      }

      this.setImage();

      this.setPosition(this.index);
    }
    createDiv() {
      const div = document.createElement('div');
      div.style.backgroundSize = `${this.puzzle.width}px ${this.puzzle.height}px`;
      div.style.border = '1px solid rgb(0, 0, 0)';
      div.style.position = 'absolute';
      div.onclick = () => {
        const currentCellIndex = this.puzzle.findPosition(this.index);
        const emptyCellIndex = this.puzzle.findEmpty();
        const {
          x,
          y
        } = this.getXY(currentCellIndex);
        const {
          x: emptyX,
          y: emptyY
        } = this.getXY(emptyCellIndex);
        // console.log(x,y);
        // console.log(emptyX, emptyY);
        if ((x === emptyX || y === emptyY) &&
          (Math.abs(x - emptyX) === 1 || Math.abs(y - emptyY) === 1)) {
          this.puzzle.numberOfMovements++;
          if (this.puzzle.onSwap && typeof this.puzzle.onSwap === 'function') {
            this.puzzle.onSwap(this.puzzle.numberOfMovements);
          }
          this.puzzle.swapCells(currentCellIndex, emptyCellIndex, true);
        }
      };
      return div;
    }
    setImage() {

      const {
        x,
        y
      } = this.getXY(this.index);

      const left = this.width * x;
      const top = this.height * y;

      // console.log(this.width);

      this.el.style.width = `${this.width}px`;
      this.el.style.height = `${this.height}px`;
      this.el.style.backgroundImage = `url("${this.puzzle.imageSrc}")`;
      // console.log(this.puzzle.imageSrc);

      this.el.style.backgroundPosition = `-${left}px -${top}px`;
      this.el.style.borderRadius = `5px`;


    }
    setPosition(destinationIndex, animate, currentIndex) {
      console.log("1", destinationIndex);
      console.log("2", currentIndex);
      const {
        left,
        top
      } = this.getPositionFromIndex(destinationIndex);

      const {
        left: currentLeft,
        top: currentTop
      } = this.getPositionFromIndex(currentIndex);

      if (animate) {
        if (left !== currentLeft) {
          this.animate('left', currentLeft, left);
        } else if (top !== currentTop) {
          this.animate('top', currentTop, top);
        }
      } else {
        this.el.style.left = `${left}px`;
        this.el.style.top = `${top}px`;
      }

    }
    animate(position, currentPosition, destination) {
      console.log(position, currentPosition, destination);

      const animationDuration = 60;
      const frameRate = 10;
      let step = frameRate * Math.abs((destination - currentPosition)) / animationDuration;
      let id = setInterval(() => {
        if (currentPosition < destination) {
          currentPosition = Math.min(destination, currentPosition + step);
          if (currentPosition >= destination) {
            clearInterval(id)
          }
        } else {
          currentPosition = Math.max(destination, currentPosition - step);
          if (currentPosition <= destination) {
            clearInterval(id)
          }
        }
        this.el.style[position] = currentPosition + 'px';
      }, frameRate)
    }
    getPositionFromIndex(index) {

      const {
        x,
        y
      } = this.getXY(index);
      return {
        left: this.width * x,
        top: this.height * y
      }
    }
    getXY(index) {
      return {
        x: index % this.puzzle.dimmension,
        y: Math.floor(index / this.puzzle.dimmension)
      }
    }
  }
  /////////////////////// Name ////////////////////////////

  class Name {
    constructor(name, fontname) {
      this.name = name;
      this.fontname = fontname;
      <?php foreach ($obj as $result) { ?> this.textName = document.createTextNode("<?php echo $result[$get_num]->title; ?>");
      <?php } ?>
      // console.log(this.ra);
      this.h1 = this.createH1();
      name.appendChild(this.h1);
      this.h1.appendChild(this.textName);
    }

    createH1() {
      const h1 = document.createElement('h1');
      h1.classList = `text-center`;
      h1.style.color = `#fff`;
      h1.style.padding = `0`;
      h1.style.display = `block`;
      h1.style.marginLeft = `auto`;
      h1.style.marginRight = `auto`;
      h1.style.fontSize = `${this.fontname}rem`;
      return h1;
    }
  }

  /////////////////////// Model ////////////////////////////

  class Model {
    constructor(model, url, imgwidth, ra) {
      this.model = model;
      this.ra = ra;
      // console.log(this.ra);
      <?php foreach ($obj as $result) { ?> this.url = "<?php echo $result[$get_num]->image; ?>";
      <?php } ?> this.imgwidth = imgwidth;
      this.img = this.createImg();
      model.appendChild(this.img);
    }

    createImg() {
      const img = document.createElement('img');
      img.src = this.url;
      // img.style.maxWidth = `${this.imgwidth}%`;
      img.style.height = `auto`;
      img.style.display = `block`;
      img.style.marginLeft = `auto`;
      img.style.marginRight = `auto`;
      img.style.border = `5px solid rgb(255, 255, 255)`;
      return img;
    }
  }

  /////////////////////// Time ////////////////////////////

  class Time {
    constructor(time, fonttime) {
      this.audioController = new AudioController();
      this.time = time;
      this.fonttime = fonttime;
      this.timeRemaining = 0;
      this.timesum = 0;
      this.zelos = "0";
      this.zelom = "0";
      this.textTime = document.createTextNode("จับเวลา 00:00 นาที");
      this.p = this.createTime();
      time.appendChild(this.p);
      this.text = time.appendChild(this.p);
      this.text.appendChild(this.textTime);
      setTimeout(() => {

        this.countdown = this.startCountdown();

      }, 4000)

    }

    createTime() {
      const p = document.createElement('p');

      p.classList = `text-left`;
      p.style.textShadow = `2px 2px 4px blue`;
      // p.style.fontSize = `24px`;
      p.style.paddingLeft = `1rem`;
      p.style.color = `rgb(255, 255, 255)`;
      p.style.position = `absolute`;
      p.style.fontSize = `${this.fonttime-1.10}rem`;
      return p;

    }

    startCountdown() { // นับเวลาถอยหลัง
      return setInterval(() => {
        this.timeRemaining++;
        if (this.timesum == 9 && this.timeRemaining == 60) {
          this.zelom = "";
        }
        if (this.timeRemaining == 60) {
          this.timesum++;
          this.timeRemaining = 0;
        } else if (this.timeRemaining == 10) {
          this.zelos = "";
        }
        if (this.timeRemaining == 0) {
          this.zelos = "0";
        }
        this.text.innerText = "จับเวลา " + this.zelom + this.timesum + ":" + this.zelos + this.timeRemaining + " นาที";
      }, 1000);
      // console.log(this.timeRemaining);
    }

    stoptime() {
      clearInterval(this.countdown);
    }

    getsumtime() {
      return this.zelom + this.timesum + ":" + this.zelos + this.timeRemaining + " นาที";
    }
    get_timesum() {
      return this.timesum;
    }
    get_timeRemaining() {
      return this.timeRemaining;
    }

  }

  /////////////////////// PicturePuzzle ////////////////////////////

  class PicturePuzzle {
    constructor(name, model, time, fontname, el, width, volume, dimmension = 3) {
      this.volume = volume;

      this.name = name;
      this.model = model;
      this.time = time;
      this.fontname = fontname;
      this.parentEl = el;
      <?php foreach ($obj as $result) { ?>
        this.imageSrc = "<?php echo $result[$get_num]->image; ?>";
      <?php } ?>
      this.audioController = new AudioController();
      this.width = width;
      this.dimmension = dimmension;
      this.classtime = new Time(this.time, this.fontname);
      this.cells = [];
      this.tag = [];
      this.shuffling = false;
      this.numberOfMovements = 0;
      this.onFinished = () => {};
      this.onSwap = () => {};
      this.init();
      const img = new Image();
      img.onload = () => {

        // console.log(img.width, img.height);

        /**

         * this.height      img.height

         * -----------   =  ---e-------

         * this.width       img.width

         */

        this.height = img.height * this.width / img.width;
        this.el.style.width = `${this.width+10}px`;
        this.el.style.height = `${this.height+10}px`;
        // console.log(this.width);



        this.setup();
      };

      img.src = this.imageSrc;

    }

    init() {
      this.el = this.createWrapper();
      this.parentEl.appendChild(this.el);
    }

    createWrapper() {
      const div = document.createElement('div');
      div.style.position = 'relative';
      div.style.margin = ' 0 auto';
      div.style.background = '#c3c3c3';
      div.style.border = '5px solid rgb(255, 255, 255)';
      div.style.borderRadius = '7px';
      div.style.boxShadow = '9px 9px 0 #000';
      return div;
    }

    setup() {


      for (let i = 0; i < this.dimmension * this.dimmension; i++) {
        // console.log("set");
        this.cells.push(new Cell(this, i));
      }
      this.tag.push(new Name(this.name, this.fontname));
      // this.tag.push(new Model(this.model, this.imageSrc, this.imgmodelwidth, this.ra));
      this.tag.push(this.classtime);
      let index = 1;
      for (let i = 34; i <= 41; i++) {
        if (document.getElementsByTagName('div')[i]) {
          document.getElementsByTagName('div')[i].append(index++);
          document.getElementsByTagName('div')[i].style.color = 'red';
          document.getElementsByTagName('div')[i].style.fontSize = '28px';
        }
      }
      var Counting_time = 4;




      var time_start = setInterval(() => {
        Counting_time--;



        if (Counting_time === 0) {
          document.getElementById('start').classList.remove('visible');
          clearInterval(time_start);
          // if (<?php echo $get_volume ?> === true) {
          //   console.log("start");
          //   this.audioController.startMusic();
          // }else{
          //   this.audioController.stopMusic();
          // }
        }

        document.getElementById('timestart').innerHTML = Counting_time;
        document.getElementById('timestart').style.fontSize = '28vw';
        // console.log(Counting_time);



      }, 1000);
      setTimeout(() => { // ตัวนับเวลา




        this.shuffle();

      }, 4000)

    }

    shuffle() {
      this.shuffling = true;
      const j = Math.floor(Math.random() * 4);
      console.log(j);

      if (j == 0) {
        this.swapCells(8, 8); // ช่องว่าง i: index j: ตำแหน่ง
        this.swapCells(7, 4);
        this.swapCells(6, 0);
        this.swapCells(5, 2);
        this.swapCells(4, 3);
        this.swapCells(3, 7);
        this.swapCells(2, 6);
        this.swapCells(1, 5);
        this.swapCells(0, 1);
      } else if (j == 1) {
        this.swapCells(8, 8); // ช่องว่าง i: index j: ตำแหน่ง
        this.swapCells(7, 0);
        this.swapCells(6, 4);
        this.swapCells(5, 1);
        this.swapCells(4, 6);
        this.swapCells(3, 5);
        this.swapCells(2, 7);
        this.swapCells(1, 2);
        this.swapCells(0, 3);
      } else if (j == 2) {
        this.swapCells(8, 8); // ช่องว่าง i: index j: ตำแหน่ง
        this.swapCells(7, 0);
        this.swapCells(6, 5);
        this.swapCells(5, 1);
        this.swapCells(4, 7);
        this.swapCells(3, 4);
        this.swapCells(2, 3);
        this.swapCells(1, 6);
        this.swapCells(0, 2);
      } else if (j == 3) {
        this.swapCells(8, 8); // ช่องว่าง i: index j: ตำแหน่ง
        this.swapCells(7, 2);
        this.swapCells(6, 7);
        this.swapCells(5, 3);
        this.swapCells(4, 6);
        this.swapCells(3, 4);
        this.swapCells(2, 5);
        this.swapCells(1, 0);
        this.swapCells(0, 1);
      }
      this.shuffling = false;
    }
    getvolume() {
      return this.volume;
    }
    swapCells(i, j, animate) {

      // console.log("volume:", this.volume);
      if (<?php echo $get_volume ?> == true) {
        this.audioController.sliding();
      } else {
        this.audioController.stopsliding();
      }
      if (this.volume == true) {
        this.audioController.sliding();
      } else {
        this.audioController.stopsliding();
      }
      // console.log("swapCells");
      this.cells[i].setPosition(j, animate, i);
      this.cells[j].setPosition(i);
      [this.cells[i], this.cells[j]] = [this.cells[j], this.cells[i]];
      // console.log(this.cells);
      if (!this.shuffling && this.isAssembled()) {
        if (this.onFinished && typeof this.onFinished === 'function') {
          this.onFinished.call(this);
          this.classtime.stoptime();
          setTimeout(() => {
            if (<?php echo $get_volume ?> == true) {
              this.audioController.victory();
            } else {
              this.audioController.stopvictory();
            }
            if (this.volume == true) {
              this.audioController.victory();
            } else {
              this.audioController.stopvictory();
            }
            // alert("Show good job \n" + "Time: " + this.classtime.getsumtime()  );
            document.getElementById('end').classList.add('visible');


            this.star1 = document.getElementById('star1');
            this.star2 = document.getElementById('star2');
            this.star3 = document.getElementById('star3');





            var ntime = this.classtime.get_timesum();
            var stime = this.classtime.get_timeRemaining();

            var ntime = ntime * 60;
            var sumtime = ntime + stime;
            // console.log(sumtime);
            if (sumtime <= 20) {
              this.star1_60 = this.createstar_star_60();
              this.star2_100 = this.createstar_star_100();
              this.star3_60 = this.createstar_star_60();
              star1.appendChild(this.star1_60);
              star2.appendChild(this.star2_100);
              star3.appendChild(this.star3_60);
            } else if (sumtime <= 25) {
              this.star1_1_60 = this.createstar_star_60();
              this.star2_1_100 = this.createstar_star_100();
              this.star3_1_60 = this.createstar_star_half_60();
              star1.appendChild(this.star1_1_60);
              star2.appendChild(this.star2_1_100);
              star3.appendChild(this.star3_1_60);

            } else if (sumtime <= 30) {
              this.star1_2_60 = this.createstar_star_60();
              this.star2_2_100 = this.createstar_star_100();
              this.star3_2_60 = this.createstar_star_place_60();
              star1.appendChild(this.star1_2_60);
              star2.appendChild(this.star2_2_100);
              star3.appendChild(this.star3_2_60);
            } else if (sumtime <= 35) {
              this.star1_3_60 = this.createstar_star_60();
              this.star2_3_100 = this.createstar_star_half_100();
              this.star3_3_60 = this.createstar_star_place_60();
              star1.appendChild(this.star1_3_60);
              star2.appendChild(this.star2_3_100);
              star3.appendChild(this.star3_3_60);
            } else if (sumtime <= 40) {
              this.star1_3_60 = this.createstar_star_60();
              this.star2_3_100 = this.createstar_star_place_100();
              this.star3_3_60 = this.createstar_star_place_60();
              star1.appendChild(this.star1_3_60);
              star2.appendChild(this.star2_3_100);
              star3.appendChild(this.star3_3_60);
            } else if (sumtime <= 45) {
              this.star1_4_60 = this.createstar_star_half_60();
              this.star2_4_100 = this.createstar_star_place_100();
              this.star3_4_60 = this.createstar_star_place_60();
              star1.appendChild(this.star1_4_60);
              star2.appendChild(this.star2_4_100);
              star3.appendChild(this.star3_4_60);
            } else if (sumtime > 50) {
              this.star1_5_60 = this.createstar_star_place_60();
              this.star2_5_100 = this.createstar_star_place_100();
              this.star3_5_60 = this.createstar_star_place_60();
              star1.appendChild(this.star1_5_60);
              star2.appendChild(this.star2_5_100);
              star3.appendChild(this.star3_5_60);
            }

            console.log(this.volume);

            document.getElementById('total_time').innerHTML = this.classtime.getsumtime();
            // location.replace("./index.php?Id=" + <?php //echo $get_id 
                                                    ?>);
            // document.getElementById('menu').location.replace("./index.php?Id=" + <?php //echo $get_id 
                                                                                    ?>);
            $("#menu").click(function() {
              // alert("go to menu.");      
              location.replace("./index.php?Museum=" + <?php echo $get_museum ?> + "&Id=" + <?php echo $get_id ?>);
              $('.main').hide();
            });

          }, 500);
        }
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
    isAssembled() {
      for (let i = 0; i < this.cells.length; i++) {
        if (i !== this.cells[i].index) {
          if (i === 6 && this.cells[i].index === 8 && this.cells[i + 1].index === i + 1) {
            return true;
          }
          return false;
        }
      }
      return true;
    }
    findPosition(ind) {
      // console.log("text",ind);

      return this.cells.findIndex(cell => cell.index === ind);
    }
    findEmpty() {
      return this.cells.findIndex(cell => cell.isEmpty);
    }

  }
  window.PicturePuzzle = window.PicturePuzzle || PicturePuzzle;



  ////////////////////////////// Ready ////////////////////////////////////////
</script>
<script>
  function Ready() {

    // console.log("Ready");
    // console.log(<?php //echo $get_id 
                    ?>, <?php //echo $get_num 
                        ?>);
    const ra = <?php echo $get_num ?>;
    // console.log(ra);
    var Id_name = document.querySelector('#name');
    var Id_model = document.querySelector('#model');
    var Id_time = document.querySelector('#time');
    var Id_puzzle_wrapper = document.querySelector('#puzzle-wrapper');

    if (window.matchMedia("(min-width: 1441px)").matches) {
      console.log("labtop 17 นอน");
      var sizeimg = 680;
      var fontname = 6;
    }
    if (window.matchMedia("(min-width: 1366px) and (max-width: 1440px)").matches) {
      console.log("ipad pro,labtop 15 นอน");
      var sizeimg = 680;
      var fontname = 6;
    }
    if (window.matchMedia("(min-width: 1025px) and (max-width: 1365px)").matches) {
      console.log("labtop 13");
      var sizeimg = 600;
      var fontname = 4.5;
    }
    if (window.matchMedia("(min-width: 824px) and (max-width: 1024px)").matches) {
      console.log("ipad pro ตั้ง");
      var sizeimg = 680;
      var fontname = 6;
    }
    if (window.matchMedia("(min-width: 1024px) and (max-height: 768px)").matches) {
      console.log("ipad นอน");
      var sizeimg = 400;
      var fontname = 5;
    }
    if (window.matchMedia("(min-width: 801px) and (max-width: 823px)").matches) {
      console.log("iphone x,Pixel 2xl นอน");
      var sizeimg = 300;
      var fontname = 3;
    }
    if (window.matchMedia("(min-width: 768px) and (max-width: 800px)").matches) {
      console.log("ipad ตั้ง");
      var sizeimg = 400;
      var fontname = 5;
    }
    if (window.matchMedia("(min-width: 736px) and (max-width: 767px)").matches) {
      console.log("iphone 6,7,8plus นอน");
      var sizeimg = 315;
      var fontname = 3;
    }
    if (window.matchMedia("(min-width: 569px) and (max-width: 735px)").matches) {
      console.log("iphone 6,7,8,Galaxy s5,Pixel 2 นอน");
      // var sizeimg = 310;
      var sizeimg = 300;
      var fontname = 2.90;
    }
    if (window.matchMedia("(min-width: 416px) and (max-width: 568px)").matches) {
      console.log("iphon 5/se นอน");
      var sizeimg = 200;
      var fontname = 2.50;
    }
    if (window.matchMedia("(min-width: 414px) and (max-width: 416px)").matches) {
      console.log("iphon 6,7,8plus ตั้ง");
      var sizeimg = 315;
      var fontname = 3;
    }
    if (window.matchMedia("(min-width: 411px) and (max-width: 413px)").matches) {
      console.log("Pixel 2,2xl ตั้ง");
      // var sizeimg = 364;
      var sizeimg = 300;
      var fontname = 3;
    }
    if (window.matchMedia("(min-width: 361px) and (max-width: 410px)").matches) {
      console.log("iphon 6,7,8,x ตั้ง");
      // var sizeimg = 310;
      var sizeimg = 300;
      var fontname = 2.90;
    }
    if (window.matchMedia("(min-width: 321px) and (max-width: 360px)").matches) {
      console.log("Galaxy s5");
      var sizeimg = 300;
      var fontname = 2.90;
    }
    if (window.matchMedia("(min-width: 20px) and (max-width: 320px)").matches) {
      console.log("iphon 5/se ตั้ง");
      var sizeimg = 272;
      var fontname = 3;
    }
    let volume = <?php echo $get_volume ?>;
    // console.log(volume);

    let picturePuzzle = new PicturePuzzle(Id_name, Id_model, Id_time, fontname, Id_puzzle_wrapper, sizeimg, volume);

    $("#restart").click(function() {
      // alert("go to restart.");
      document.getElementById('end').classList.remove('visible');
      location.replace("./main.php?Museum=" + <?php echo $get_museum ?> + "&Id=" + <?php echo $get_id ?> + "&Num=" + <?php echo $get_num ?> + "&volume=" + picturePuzzle.getvolume());
    });
    $("#restart1").click(function() {
      console.log("go to restart");
      location.replace("./main.php?Museum=" + <?php echo $get_museum ?> + "&Id=" + <?php echo $get_id ?> + "&Num=" + <?php echo $get_num ?> + "&volume=" + picturePuzzle.getvolume());
    });
    $("#music").click(function() {
      console.log("mussic off");
      document.getElementById('music1').classList.add('visible');
      document.getElementById('music').classList.remove('visible');
      // picturePuzzle.audioController.stopMusic();
      picturePuzzle.volume = false;
      return volume;
    });
    $("#music1").click(function() {
      console.log("mussic on");
      document.getElementById('music').classList.add('visible');
      document.getElementById('music1').classList.remove('visible');
      // picturePuzzle.audioController.startMusic();
      picturePuzzle.volume = true;
      return volume;
    });
    $("#music2").click(function() {
      console.log("mussic on");
      document.getElementById('music3').classList.add('visible');
      document.getElementById('music2').classList.remove('visible');
      // picturePuzzle.audioController.startMusic();
      picturePuzzle.volume = true;
      return volume;
    });
    $("#music3").click(function() {
      console.log("mussic off");
      document.getElementById('music2').classList.add('visible');
      document.getElementById('music3').classList.remove('visible');
      // picturePuzzle.audioController.startMusic();
      picturePuzzle.volume = true;
      return volume;
    });
    $("#music_start").click(function() {
      console.log("mussic on");
      document.getElementById('music_stop').classList.add('visible');
      document.getElementById('music_start').classList.remove('visible');
      picturePuzzle.audioController.stopMusic();
    });
    $("#music_stop").click(function() {
      console.log("mussic on");
      document.getElementById('music_start').classList.add('visible');
      document.getElementById('music_stop').classList.remove('visible');
      picturePuzzle.audioController.startMusic();
    });
    $("#home").click(function() {
      console.log("home");
      location.replace("./index.php?Museum=" + <?php echo $get_museum ?> + "&Id=" + <?php echo $get_id ?>);
      $('.main').hide();
    });
  }

  if (document.ReadyState == 'loading') {
    document.addEventListener('DOMContentLoaded', ready);
  } else {
    Ready();
  }
</script>