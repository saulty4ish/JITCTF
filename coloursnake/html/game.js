var xhr = (function(){
    var _xhr = new XMLHttpRequest();

    return function(url,callback){
        _xhr.open("GET",url,true);
        _xhr.onreadystatechange = function(){
            if (_xhr.readyState==4 && _xhr.status==200){
                callback(_xhr.responseText);
            }
        }
        _xhr.send();
    }
})();

var map = {
    self: document.getElementById('game-area'),
    pix: document.getElementsByClassName('pix'),
    col: 80,
    line: 40,
    getNum: function(line, col) {
        return num = (line - 1) * map.col + col - 1
    },
    getPix: function(line, col) {
        var num = (line - 1) * map.col + col - 1;
        return map.pix[num]
    },
    blackIt: function(pix, color) {
        ////console.log(typeof pix.style)
        if(typeof pix != 'undefined')
            pix.style.backgroundColor = color
    },
    blackPix: function(line, col, color) {
        map.blackIt(map.getPix(line, col), color)
    }
};

var color = ["#F44336","#E91E63","#9C27B0", "#3F51B5" ,"#2196F3","#00BCD4","#009688","#8BC34A","#FFEB3B","#FF5722","#607D8B"];

var snake = {
    bodyColor: "#000",
    headColor: "red",
    mapColor: "#ddd",
    body: [{
        line: 10,
        col: 9
    }, {
        line: 10,
        col: 10
    }, {
        line: 10,
        col: 11
    },{
        line: 10,
        col: 12
    },{
        line: 10,
        col: 13
    },{
        line: 10,
        col: 14
    },{
        line: 10,
        col: 15
    }],
    direction: {
        up: {
            line: -1,
            col: 0,
            side: {
                line: 1,
                col: -1
            },
            loop: {
                line: map.line - 1,
                col: 0
            },
            oppo: 'down'
        },
        down: {
            line: +1,
            col: 0,
            side: {
                line: map.line,
                col: -1
            },
            loop: {
                line: 1 - map.line,
                col: 0
            },
            oppo: 'up'
        },
        left: {
            line: 0,
            col: -1,
            side: {
                line: -1,
                col: 1
            },
            loop: {
                line: 0,
                col: map.col - 1
            },
            oppo: 'right'
        },
        right: {
            line: 0,
            col: +1,
            side: {
                line: -1,
                col: map.col
            },
            loop: {
                line: 0,
                col: 1 - map.col
            },
            oppo: 'left'
        }
    },
    headDirection: 'left',
    getDirection: function(i) {
        if (i == 0) {
            return snake.headDirection
        }
        var current = map.getNum(snake.body[i].line, snake.body[i].col);
        var pre = map.getNum(snake.body[i - 1].line, snake.body[i - 1].col);
        var gap = current - pre;
        var direction = '';
        if (Math.abs(gap) == 1) {
            if (gap > 0) {
                direction = 'left'
            } else {
                direction = 'right'
            }
        } else if (Math.abs(gap) == 1 * map.col) {
            if (gap > 0) {
                direction = 'up'
            } else {
                direction = 'down'
            }
        } else if (Math.abs(gap) == map.col - 1) {
            if (gap > 0) {
                direction = 'right'
            } else {
                direction = 'left'
            }
        } else if (Math.abs(gap) == (map.line - 1) * map.col) {
            if (gap > 0) {
                direction = 'down'
            } else {
                direction = 'up'
            }
        } else {
            //console.log('....' + gap)
        }
        return direction
    },
    followDirection: function(i) {
        var direction = snake.getDirection(i);
        var dirToGo = snake.direction[direction];
        var oldL = snake.body[i].line;
        var oldC = snake.body[i].col;
        if (snake.body[i].line == dirToGo.side.line || snake.body[i].col == dirToGo.side.col) {
            snake.body[i].line += dirToGo.loop.line;
            snake.body[i].col += dirToGo.loop.col
        } else {
            snake.body[i].line += dirToGo.line;
            snake.body[i].col += dirToGo.col

        } 

        if (snake.body[i].line == food.ran.line && snake.body[i].col == food.ran.col) {
            console.log('eat');
            snake.addBody();snake.addBody();snake.addBody();snake.addBody();snake.addBody();snake.addBody();
            food.empty();
            food.getPoint();
            /////////score
            xhr('./getScore.php',function(e){
                var r = JSON.parse(e);
                if(r.state == 200)
                    game.addScore(r.score);
                else{
                    alert(r.msg);
                    game.start()
                }
            })
            //game.addScore();
        }
        if (i == 0) {
            map.blackPix(snake.body[i].line, snake.body[i].col, snake.headColor)
        } else {
            map.blackPix(snake.body[i].line, snake.body[i].col, snake.bodyColor)
        } if (i == snake.body.length - 1) {
            map.blackPix(oldL, oldC, snake.mapColor)
        }
    },
    showSnake: function() {
        var i;
        for (i = map.pix.length - 1; i >= 0; i--) {
            map.pix[i].style.backgroundColor = '#ddd'
        }
        for (var i in snake.body) {
            if (i == 0) {
                map.blackPix(snake.body[i].line, snake.body[i].col, snake.headColor)
            } else {
                map.blackPix(snake.body[i].line, snake.body[i].col, snake.bodyColor)
            }
        }
    },
    move: function() {

        for (var i = snake.body.length - 1; i >= 0; i--) {
            snake.followDirection(i)
            map.blackPix(snake.body[i].line,snake.body[i].col,color[i%color.length])
        }
        for (var j = snake.body.length - 1; j > 0; j--) {
            if (snake.body[j].line == snake.body[0].line && snake.body[j].col == snake.body[0].col) {
                game.reset();
                game.result();
                break
            }
        }
    },
    keepMoving: function() {
        window.gaming = requestAnimationFrame(function() {
            if (game.gaming == false || game.over == true) {} else {
                snake.move()
            }
            snake.keepMoving()
        })
    },
    addBody: function() {
        var last = snake.body[snake.body.length - 1];
        var direction = snake.direction[snake.getDirection(snake.body.length - 1)];
        if(!direction)
            return;
        var newBody = {
            line: last.line - direction.line,
            col: last.col - direction.col,
        };
        snake.body.push(newBody);
        //console.log(newBody)
    }
};
var food = {
    color: 'green',
    ran: {},
    getRandom: function() {
        var line = Math.ceil(Math.random() * map.line);
        var col = Math.ceil(Math.random() * map.col);
        return {
            line: line,
            col: col
        }
    },
    checkRandom: function() {
        var ran = food.getRandom();
        for (var i = snake.body.length - 1; i >= 0; i--) {
            if (snake.body[i].line == ran.line && snake.body[i].col == ran.col) {
                //console.log('repeat');
                food.checkRandom();
                break
            }
        }
        return ran
    },
    getPoint: function() {
        ran = food.checkRandom();
        map.blackPix(ran.line, ran.col, food.color);
        food.ran.line = ran.line;
        food.ran.col = ran.col;
        //console.log(ran)
    },
    empty: function() {
        food.ran = {}
    }
};
var game = {
    score: 0,
    scoreBoard: document.getElementById('score'),
    gaming: false,
    over: true,
    reset: function() {
        game.over = true;
        game.gaming = false;
        if (typeof gaming != 'undefined') {
            cancelAnimationFrame(gaming)
        }
        snake.showSnake()
    },
    start: function() {
        game.reset();
        snake.body = [{
        line: 10,
        col: 9
    }, {
        line: 10,
        col: 10
    }, {
        line: 10,
        col: 11
    },{
        line: 10,
        col: 12
    },{
        line: 10,
        col: 13
    },{
        line: 10,
        col: 14
    },{
        line: 10,
        col: 15
    }];
        snake.headDirection = 'left';
        food.empty();
        snake.showSnake();
        game.gaming = true;
        game.over = false;
        snake.keepMoving();
        food.getPoint();
        //console.log(game.scoreBoard);
        game.score = 0;
        game.scoreBoard.innerText = '0';
        xhr('./getScore.php?reset',function(){});
    },
    goon: function() {
        snake.keepMoving()
    },
    addScore: function(score) {
        game.score = score;
        console.log(game.score);
        game.scoreBoard.innerText = score;
    },
    changeDirection: function(direction) {
        if (snake.direction[snake.headDirection].oppo == direction) {
            //console.log('你并不能把snake翻过来过来');
            return;
        }
        snake.headDirection = direction
    },
    pause: function() {
        if (game.over == true) {
            return;
        }
        if (game.gaming == true) {
            game.gaming = false
        } else {
            game.gaming = true
        }
    },
    result: function() {
        var score = game.score;
        var check = "width.php";
        alert('you get '+score);
    }
};
game.reset();
window.onkeydown = function(e) {
    var key = e.keyCode;
    var direction;
    //console.log(key);
    snake.addBody();
    switch (key) {
        case 37:
            game.changeDirection('left');
            break;
        case 38:
            game.changeDirection('up');
            break;
        case 39:
            game.changeDirection('right');
            break;
        case 40:
            game.changeDirection('down');
            break;
        case 13:
            game.start();
            break;
        case 32:
            game.pause();
            break;
        default:
            return
    }
};
document.getElementById('startButton').onclick = function() {
    game.start()
};
document.getElementById('parseButton').onclick = function() {
    game.pause()
};