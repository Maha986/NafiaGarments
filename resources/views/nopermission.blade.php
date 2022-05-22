


<!DOCTYPE html>
<html lang="en">
<head>
  <title>No Permission</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



<style>
  
@import url('https://fonts.googleapis.com/css?family=Comfortaa');

$bg: darken(#F76B1C, 20%);

* {
  box-sizing: border-box;
}
body,
html {
  margin: 0;
  padding: 0;
  height: 100%;
  overflow: hidden;
}
body {
  background-color: darken(#F76B1C, 20%);
  font-family: sans-serif;
}
.container {
  z-index: 1;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%,-50%);
  text-align: center;
  padding: 10px;
  min-width: 300px;
  div {
    display: inline-block;
  }
  .lock {
    opacity: 1;
  }
  h1 {
    font-family: 'Comfortaa', cursive;
    font-size: 100px;
    text-align: center;
    color: #eee;
    font-weight: 100;
    margin: 0;
  }
  p {
    color: #fff;
  }
}
.lock {
  transition: 0.5s ease;
  position: relative;
  overflow: hidden;
  opacity: 0;
  &.generated {
    transform: scale(0.5);
    position: absolute;
    animation: 2s move linear;
    animation-fill-mode: forwards;
  }
  ::after {
    content: '';
    background: darken(#F76B1C, 20%);
    opacity: 0.3;
    display: block;
    position: absolute;
    height: 100%;
    width: 50%;
    top: 0;
    left: 0;
  }
  .bottom {
    background: #D68910;
    height: 40px;
    width: 60px;
    display: block;
    position: relative;
    margin: 0 auto;
  }
  .top {
    height: 60px;
    width: 50px;
    border-radius: 50%;
    border: 10px solid #fff;
    display: block;
    position: relative;
    top: 30px;
    margin: 0 auto;
    &::after {
      padding: 10px;
      border-radius: 50%;
    }
  }
}
@keyframes move {
  to {
    top: 100%;
  }
}
@media (max-width: 420px) {
  .container {
    transform: translate(-50%,-50%) scale(0.8)
  }
  .lock.generated {
    transform: scale(0.3);
  }
}

</style>






</head>
<body>

<div class="container">
  <h1 style="font-size: 260px;"><b>
   
   404  

  </b></h1><h2><b>You donot have permission of access on this !</b></h2>
</div>

<script>
  
  const interval = 500;

function generateLocks() {
  const lock = document.createElement('div'),
        position = generatePosition();
  lock.innerHTML = '<div class="top"></div><div class="bottom"></div>';
  lock.style.top = position[0];
  lock.style.left = position[1];
  lock.classList = 'lock'// generated';
  document.body.appendChild(lock);
  setTimeout(()=>{
    lock.style.opacity = '1';
    lock.classList.add('generated');
  },100);
  setTimeout(()=>{
    lock.parentElement.removeChild(lock);
  }, 2000);
}
function generatePosition() {
  const x = Math.round((Math.random() * 100) - 10) + '%';
  const y = Math.round(Math.random() * 100) + '%';
  return [x,y];
}
setInterval(generateLocks,interval);
generateLocks();
</script>

</body>

</html>









