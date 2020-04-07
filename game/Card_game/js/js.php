<script>
class AudioController {
    constructor() {
        //console.log("constructor() class AudioController");
        // โหลด file เพลง
        this.bgMusic = new Audio('Assets/Audio/Carefree.mp3');
        this.flipSound = new Audio('Assets/Audio/flip.wav');
        this.matchSound = new Audio('Assets/Audio/match.wav');
        this.victorySound = new Audio('Assets/Audio/victory.wav');
        this.gameOverSound = new Audio('Assets/Audio/gameOver.wav');
        this.bgMusic.volume = 0.5;
        this.bgMusic.loop = true;
    }
    startMusic() {
        console.log("startMusic() class AudioController");
        
        this.bgMusic.play();
    }
    stopMusic() {
        // console.log("stopMusic() class AudioController");
        
        this.bgMusic.pause();
        this.bgMusic.currentTime = 0;
    }
    flip() {
        // console.log("flip() class AudioController");
        
        this.flipSound.play();
    }
    stopflip() {
        // console.log("flip() class AudioController");
        
        this.flipSound.pause();
    }
    match() {
        // console.log("match() class AudioController");
        
        this.matchSound.play();
    }
    stopmatch() {
        // console.log("match() class AudioController");
        
        this.matchSound.pause();
    }
    victory() {
        // console.log("victory() class AudioController");
        
        this.stopMusic();
        this.victorySound.play();
    }
    stopvictory() {
        // console.log("victory() class AudioController");
        
        this.stopMusic();
        this.victorySound.pause();
    }
    gameOver() {
        // console.log("gameOver() class AudioController");
        
        this.stopMusic();
        this.gameOverSound.play();
    }
    stopgameOver() {
        // console.log("gameOver() class AudioController");
        
        this.stopMusic();
        this.gameOverSound.pause();
    }
}

class MixOrMatch {
    
    constructor(totalTime, cards, volume) {
        this.cardsArray = cards; // ไพ่ทั้งหมด เก็บเป็น array
        this.totalTime = totalTime; // เวลาเริ่มต้น
        this.timeRemaining = totalTime; // เก็บค่าเวลาเริ่มต้นลง timeRemaining
        this.timer = document.getElementById('time-remaining') // ไว้แสดงเวลานับถอยหลัง
        this.ticker = document.getElementById('flips'); // ไว้แสดงจำนวนกดไพ่
        this.audioController = new AudioController(); // สร้าง object จาก AudioController 
        this.volume = volume;
        this.time = 3;
        this.victory_score = 0;
        this.timestart = document.getElementById('timestart') // ไว้แสดงเวลานับถอยหลัง

    }


    // เริ่มเกมใหม่
    startGame() { // เริ่มเกมใหม่
        this.totalClicks = 0; // ตัวแปรจำนวนการกดไพ่
        this.timeRemaining = this.totalTime; // ตัวแปรรับค่าเวลาเริ่มต้น จาก totalTime
        this.cardToCheck = null;
        this.matchedCards = [];
        this.busy = true;
  
        setTimeout(() => { // ตัวนับเวลา
            // if(this.volume == true){
            //     this.audioController.stopMusic();
            // }else{
            //     this.audioController.startMusic();
            // }
            this.shuffleCards(this.cardsArray); // สุ่มที่อยู่ไพ่
            this.countdown = this.startCountdown(); // รันเวลา
            this.busy = false;
        }, 500)
        this.hideCards(); // คว่ำไพ่
        this.timer.innerText = this.timeRemaining; // แสดงค่าเวลาเริ่มต้น
        // this.ticker.innerText = this.totalClicks; // แสดงค่าจำนวนกดไพ่
        
    }
    shuffleCards(cardsArray) { // สุ่มที่อยู่ไพ่
        
        for (let i = cardsArray.length - 1; i > 0; i--) {
            let randIndex = Math.floor(Math.random() * (i + 1));
            cardsArray[randIndex].style.order = i;
            cardsArray[i].style.order = randIndex;
        }
    }
    hideCards() { // คว่ำไพ่
        this.cardsArray.forEach(card => {
            card.classList.remove('visible'); // คว่ำไพ่ทั้งหมด
            //card.classList.remove('visible1');
            // card.classList.remove('matched'); // สลับไพ่ทั้งหมด
        });
    }
    
/////////////////////////////////////////////////////////////////////////////////////////////
    // เปิดไพ่
    flipCard(card) { // หงายไพ่
        if(this.canFlipCard(card)) {
            if(this.volume == true){
                this.audioController.stopflip();
            }else{
                this.audioController.flip();
            }
            // this.totalClicks++; // เพิ่มค่าจำนวนกด
            // this.ticker.innerText = this.totalClicks;  // แสดงค่าจำนวนกดไพ่
            card.classList.add('visible'); // แสดงหน้าไพ่
       
            if(this.cardToCheck) {
                console.log("cardToCheck: "+this.cardToCheck);
                this.checkForCardMatch(card);
            } else { 
                this.cardToCheck = card; // เก็บค่า ไพ่ ใบแรก
                console.log("cardToCheck else: "+this.cardToCheck);
            }
        }
    }
    canFlipCard(card) {
        return !this.busy && !this.matchedCards.includes(card) && card !== this.cardToCheck;
    }
    checkForCardMatch(card) {
        // ไพ่ใบที่2 = ไพ่ใบที่1
        if(this.getCardType(card) === this.getCardType(this.cardToCheck)) {
            this.cardMatch(card, this.cardToCheck); // ส่งค่าไพ่ใบที่2 , ส่งค่าไพ่ใบที่1
            this.totalClicks++; // เพิ่มค่าจำนวนกด
            // this.ticker.innerText = this.totalClicks;  // แสดงค่าจำนวนกดไพ่
            this.victory_score = this.totalClicks;
            //console.log(this.victory_score);
        }else {
            this.cardMismatch(card, this.cardToCheck);
        }
        this.cardToCheck = null;
        document.getElementById('text-victory-score').innerHTML = this.victory_score+this.timeRemaining;
    }
    cardMatch(card1, card2) { // รับค่าไพ่ใบที่2 , ส่งค่าไพ่ใบที่1
        this.matchedCards.push(card1); // ค่าไพ่ใบที่2
        this.matchedCards.push(card2); // ค่าไพ่ใบที่1
        // card1.classList.add('matched');
        // card2.classList.add('matched');
        if(this.volume == true){
            this.audioController.stopmatch();
        }else{
            this.audioController.match();
        }
        if(this.matchedCards.length === this.cardsArray.length) // ไพ่ที่เปิด = ไพ่ทั้งหมด เก็บเป็น array
            this.victory(); // ชนะ
           
    }
    getCardType(card) {
        return card.getElementsByClassName('card-value')[0].src;
    }
    cardMismatch(card1, card2) {
         this.busy = true;
         setTimeout(() => {
             card1.classList.remove('visible');
             card2.classList.remove('visible');
    
             this.busy = false;
         }, 1000);
     }
     victory() { // ทำงานเมื่อ ชนะ
        clearInterval(this.countdown);
        if(this.volume == true){
            console.log("not victory");
            this.audioController.stopvictory();
        }else{
            console.log("victory");
            this.audioController.victory();
        }
        setTimeout(() => {
            document.getElementById('victory-text').style.fontSize  = "medium";
            document.getElementById('victory-text').classList.add('visible'); // id victory-text: 22
        },2000);
       
    }

///////////////////////////////////////////////////////////////////////////////////////////////////
    // ทำงานเมื่อแพ้
    startCountdown() { // นับเวลาถอยหลัง 
        
        return setInterval(() => {  
            this.timeRemaining--;
            this.timer.innerText = this.timeRemaining;
            if(this.timeRemaining === 0)
                this.gameOver();
        }, 1000);
    }
    gameOver() { //ทำงานเมื่อ แพ้     
        clearInterval(this.countdown);
        if(this.volume == true){
            console.log("not gameover");
            this.audioController.stopgameOver();
        }else{
            console.log("gameover");
            this.audioController.gameOver();
        }
        
        document.getElementById('text-over-score').innerHTML = this.totalClicks+this.timeRemaining;
        document.getElementById('game-over-text').classList.add('visible'); // id game-over-text: 18
    }
    starttime() { // นับเวลาถอยหลัง 
        return setInterval(() => {  
                this.time--;
                this.timestart.innerText = this.time;
            if(this.time === 0){
                console.log("time = 0");
                document.getElementById('btnGetJson').classList.remove('visible');
                this.startGame();
                // this.audioController.startMusic();
                console.log(this.volume);
                
            }
            
        }, 1000);
    }
}

if (document.readyState == 'loading') {
    document.addEventListener('DOMContentLoaded', ready);
    
} else {
    
    console.log("ready11111");
    ready();

}

function ready() {
    console.log("ready()");
    
    let overlays = Array.from(document.getElementsByClassName('overlay-text'));
    let over = Array.from(document.getElementsByClassName('overlay-text-over'));
    let victory = Array.from(document.getElementsByClassName('overlay-text-victory'));
    // let overlay1s = Array.from(document.getElementsByClassName('overlay-text1'));
    let overlay2s = Array.from(document.getElementsByClassName('overlay-text2'));
    let overlay3s = Array.from(document.getElementsByClassName('overlay-text3'));
    // let overlay4s = Array.from(document.getElementsByClassName('overlay-text4'));
    // let overlay5s = Array.from(document.getElementsByClassName('overlay-text5'));
    let home = Array.from(document.getElementsByClassName('home'));
    let next = Array.from(document.getElementsByClassName('next'));
    let next1 = Array.from(document.getElementsByClassName('next1'));
    // let overlay = Array.from(document.getElementsByClassName('overlay-text'));
    let cards = Array.from(document.getElementsByClassName('card'));
    let volume = false;
    let game = new MixOrMatch(60, cards, volume);
    var get_id = <?php echo $get_id ?>;
    
    console.log("get:"+get_id);
    console.log("starttime");

        game.starttime();
        
   
    // overlays.forEach(overlay => {
    //     overlay.addEventListener('click', () => {
    //         overlay.classList.remove('visible');// ลบ Click to Start ออกจากหน้าจอ
    //         game.startGame(); // ทำการเริ่มเกม
    //     });
    // });
    home.forEach(home => {
        home.addEventListener('click', () => {
            home.classList.remove('visible');// ลบ Click to Start ออกจากหน้าจอ
                location.replace("index.php?Id="+get_id);
        });
    });
    next.forEach(next => {
        next.addEventListener('click', () => {
            next.classList.remove('visible');// ลบ Click to Start ออกจากหน้าจอ
                location.replace("level2.php?Id="+get_id);
        });
    });
    next1.forEach(next1 => {
        next1.addEventListener('click', () => {
            next1.classList.remove('visible');// ลบ Click to Start ออกจากหน้าจอ
                location.replace("level3.php?Id="+get_id);
        });
    });
    $(document).ready(function(){
        $(".try_again").click(function(){
            over.forEach(over => {
                console.log("log");
                over.classList.remove('visible');
            });
            victory.forEach(victory => {
                console.log("log");
                victory.classList.remove('visible');
            });
            game.startGame();
        });
    });

    $(document).ready(function(){ //เมื่อโหลดหน้าเพจให้คำสั่งนี้พร้อมใช้งานทันที่
        $("input:radio[name=first-switch]").click(function() {
            var guidesValue = $("input:radio[name=first-switch]:checked").val();
               
                switch (guidesValue) {
                    case 'on':
                        console.log("open");
                     
                        game.volume = false;
                        
                        break;
                    case 'off':
                        console.log("not open");
                  
                        game.volume = true;
                   
                        break;
                    default:
                        
                        break;
                }
                
        });
    });
    $(document).ready(function(){ //เมื่อโหลดหน้าเพจให้คำสั่งนี้พร้อมใช้งานทันที่
        $("input:radio[name=first-switch-music]").click(function() {
            var guidesValue = $("input:radio[name=first-switch-music]:checked").val();
               
                switch (guidesValue) {
                    case 'on':
                        console.log("open music");
                        game.audioController.startMusic();
                   
                        
                        break;
                    case 'off':
                        console.log("not open music");
                        game.audioController.stopMusic();
                
                   
                        break;
                    default:
                        
                        break;
                }
                
        });
    });
    // overlay2s.forEach(overlay2 => {
    //     overlay2.addEventListener('click', () => {
    //         overlay2.classList.remove('visible');// หยุดเสียง
    //         game.audioController.stopMusic();
    //         game.volume = true;
    //         return volume;
    //     });
    // });

    // overlay3s.forEach(overlay3 => {
    //     overlay3.addEventListener('click', () => {
    //         overlay3.classList.remove('visible');
    //         game.audioController.startMusic();
    //         game.volume = false;
    //         return volume;
    //     });
    // });

    cards.forEach(card => { // ทำงานตอนกด ไพ่
        card.addEventListener('click', () => {
            game.flipCard(card);
        });
    });
}
</script>