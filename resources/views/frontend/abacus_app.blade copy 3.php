<html>
  <head>
    <meta charset="utf-8">
    <meta name="author" content="Andrii Valchuk">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Abacus</title>
    <link rel="icon" type="image/ico" href="./favicon.ico">
    <link rel="stylesheet" type="text/css" href="./css/main.css">
    <style>
        * {
  margin: 0;
  padding: 0;
}

body {
  height: 100%;
  width: 100%;
  background-color: #f5fffa;
  display: flex;
  justify-content: center;
  font-size: 16px;
}

.content {
  height: calc(100% - 6rem);
  width: 50vh;
  margin: 1rem;
  border: 2rem ridge #8B4513;
}

@media only screen and (max-width: 600px) {
  .content {
    height: calc(93% - 6rem);
  }
}

.abacus {
  height: 100%;
  width: 100%;
}

.registr {
  height: 10%;
  position: relative;
}

.line {
  position: absolute;
  top: calc(50% - 0.125rem);
  width: 100%;
  height: 0.25rem;
}

.rod {
  height: 0.25rem;
  background: #b1b1af;
}

.ovals {
  position: absolute;
  height: 100%;
  width: 100%;
  display: flex;
}

.ovals-right {
  justify-content: flex-end;
}

.oval {
	width: 7%;
	height: 100%;
  background-image: linear-gradient(to bottom right, #cd853f, #8b4513);
	-moz-border-radius: 50% / 50%;
	-webkit-border-radius: 50% / 50%;
	border-radius: 50% / 50%;
  margin-left: auto;
  margin: 0%;
  column-gap: 0px;
  z-index: 99;
}

.oval-dark {
	width: 7%;
	height: 100%;
  background-image: linear-gradient(to bottom right, #808080, #000000);
	-moz-border-radius: 50% / 50%;
	-webkit-border-radius: 50% / 50%;
	border-radius: 50% / 50%;
  margin-left: auto;
  margin: 0%;
  column-gap: 0px;
  z-index: 99;
}
    </style>
  </head>
  <body>
    <div class="content">
      <div class="abacus">
        <div class="registr">
          <div class="line">
            <div class="rod"></div>
          </div>
          <div class="ovals">
            <div class="oval" data-direction="right" data-col-index="0"></div>
            <div class="oval" data-direction="right" data-col-index="1"></div>
            <div class="oval" data-direction="right" data-col-index="2"></div>
            <div class="oval" data-direction="right" data-col-index="3"></div>
            <div class="oval-dark" data-direction="right" data-col-index="4"></div>
            <div class="oval-dark" data-direction="right" data-col-index="5"></div>
            <div class="oval" data-direction="right" data-col-index="6"></div>
            <div class="oval" data-direction="right" data-col-index="7"></div>
            <div class="oval" data-direction="right" data-col-index="8"></div>
            <div class="oval" data-direction="right" data-col-index="9"></div>
          </div>
        </div>
      </div>
    </div>
    <script
      src="https://code.jquery.com/jquery-3.6.0.js"
      integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
      crossorigin="anonymous">
    </script>
    <script src="js/main.js" type="text/javascript"></script>
    <script>
        $( document ).ready(function() {
  $(".oval").each(function() {
    if (parseInt($(this).data("col-index")) == 0) {
      $(this).css("margin-left", "30%");
    }
  });
  $(".oval, .oval-dark").click(function() {
    let index = parseInt($(this).data("col-index"));
    if ($(this).data("direction") == "right") {
      $(this).parent().children().each(function() {
        $(this).css("margin", "0");
        let oval_index = parseInt($(this).data("col-index"));
        if (oval_index > index) {
          $(this).data("direction", "right");
        } else {
          $(this).data("direction", "left");
        }
      });
      $(this).css("margin-right", "30%");
    } else if ($(this).data("direction") == "left") {
      $(this).parent().children().each(function() {
        $(this).css("margin", "0");
        let oval_index = parseInt($(this).data("col-index"));
        if (oval_index < index) {
          $(this).data("direction", "left");
        } else {
          $(this).data("direction", "right");
        }
      });
      $(this).css("margin-left", "30%");
    }
  });
});
    </script>
  </body>
<html>