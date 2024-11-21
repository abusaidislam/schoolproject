<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Abacus Math Bangladesh</title>
    <style>
      body {
        font-family: Arial, sans-serif;
        text-align: center;
      }
      #myAbacus canvas {
        border: 1px solid #000;
        margin: 10px auto;
      }
      
    </style>
    <script type="text/javascript">
      function run() {
        var abacus = new Abacus("myAbacus", 0);
        abacus.init();
      }
    </script>
  </head>
  <body onload="run();">
    <h1>Abacus Math Bangladesh (Soroban)</h1>
    <div id="myAbacus"></div>

    <script>
      function Bead() {
        this.position = [0.0, 0.0];
        this.value = 0;
        this.active = false;
        this.uniqueID = -1;
      }

      function AbacusCtrl(type) {
        this.type = type; // 0 Japanese, 1 Chinese
        this.beadLines = 8;
        this.beadPerLine = (this.type === 0) ? 5 : 7;
        this.beadSep = (this.type === 0) ? 3 : 4;
        this.beadHeight = 40;
        this.beadSpacing = 80;
        this.beadWidth = 50; // Updated bead width to 50
        this.nodes = [];

        this.init = function() {
        this.nodes.length = 0;
        var id = 0;
        for (var i = 0; i < this.beadLines; i++) {
            for (var j = 0; j < this.beadPerLine; j++) {
                var bead = new Bead();
                bead.position[0] = 580 - i * this.beadSpacing;
                bead.position[1] = 60 + this.beadPerLine * this.beadHeight - j * this.beadHeight;
                bead.value = 1;
                if (j > this.beadSep) {
                    bead.position[1] = 60 + this.beadPerLine * this.beadHeight - (j * this.beadHeight + 2 * this.beadHeight);
                    bead.value = 5;
                }
                bead.uniqueID = id;
                this.nodes.push(bead);
                id++;
            }
            }
        };

        this.getBeadsCount = function() {
          return this.nodes.length;
        };

        this.getBeadPositionX = function(nodeId) {
          return this.nodes[nodeId].position[0];
        };

        this.getBeadPositionY = function(nodeId) {
          return this.nodes[nodeId].position[1];
        };

        this.activated = function(nodeId) {
          var line = Math.floor(nodeId / this.beadPerLine);
          var beadInLine = nodeId - line * this.beadPerLine;

          var active = this.nodes[nodeId].active;
          this.nodes[nodeId].active = !active;

          var dir = 1;
          if (beadInLine > this.beadSep) dir = -1;

          var offset = dir * (-1) * this.beadHeight;
          if (active) offset = dir * this.beadHeight;
          this.nodes[nodeId].position[1] += offset;

          if (beadInLine <= this.beadSep) {
            for (var j = 0; j < this.beadPerLine; j++) {
              var n = line * this.beadPerLine + j;
              if (j <= this.beadSep && j !== beadInLine) {
                if ((!active && j > beadInLine) || (active && j < beadInLine)) {
                  if (this.nodes[n].active === active) {
                    this.nodes[n].position[1] += offset;
                    this.nodes[n].active = !this.nodes[n].active;
                  }
                }
              }
            }
          } else {
            for (var j = 0; j < this.beadPerLine; j++) {
              var n = line * this.beadPerLine + j;
              if (j > this.beadSep && j !== beadInLine) {
                if ((!active && j < beadInLine) || (active && j > beadInLine)) {
                  if (this.nodes[n].active === active) {
                    this.nodes[n].position[1] += offset;
                    this.nodes[n].active = !this.nodes[n].active;
                  }
                }
              }
            }
          }
        };
      }

      function Abacus(parentDivId, type) {
        var abacusCtrl = new AbacusCtrl(type);
        var canvas;
        var divId = parentDivId;
        var beadColor = "#165eda"; // Blue color for the beads
        var hooveredBeadColor = "rgba(0, 0, 255, 1.0)";
        var hooveredBead = -1;
        var uiElements = [];
        var that = this;

        this.init = function() {
          abacusCtrl.init();

          canvas = document.createElement('canvas');
          canvas.id = parentDivId + "_Abacus";
          canvas.width = 40 + abacusCtrl.beadLines * abacusCtrl.beadSpacing;
          canvas.height = 60 + (abacusCtrl.beadPerLine + 2) * abacusCtrl.beadHeight;
          document.getElementById(divId).appendChild(canvas);

          canvas.onmousedown = function(event) {
            canvasMouseDown(event);
          };
          canvas.onmousemove = function(event) {
            canvasMouseMove(event);
          };
          canvas.onmouseup = function(event) {
            canvasMouseUp(event);
          };

          this.update();
        };

        function drawBead(nodeId, ctx) {
          var nodePosX = abacusCtrl.getBeadPositionX(nodeId);
          var nodePosY = abacusCtrl.getBeadPositionY(nodeId);

          var dn = { x: nodePosX, y: nodePosY + 2, x2: nodePosX + abacusCtrl.beadWidth, y2: nodePosY + abacusCtrl.beadHeight - 4, type: 0, ref: nodeId };

          ctx.fillStyle = "rgba(60, 60, 60, 0.3)";
          drawRoundRectFilled(ctx, dn.x + 4, dn.y + 4, dn.x2 - dn.x, dn.y2 - dn.y, 15);
          ctx.fillStyle = beadColor;

          if (nodeId === hooveredBead) {
            ctx.fillStyle = hooveredBeadColor;
          }
          drawRoundRectFilled(ctx, dn.x, dn.y, dn.x2 - dn.x, dn.y2 - dn.y, 15);

          uiElements.push(dn);
        }

        function drawBeads(ctx) {
          var count = abacusCtrl.getBeadsCount();
          for (var i = 0; i < count; i++) {
            drawBead(i, ctx);
          }
        }

        this.update = function() {
          canvas.width = canvas.width;

          uiElements.length = 0;
          var ctx = canvas.getContext('2d');

          ctx.strokeStyle = '#000000';
          ctx.lineWidth = 5;

          for (var i = 0; i < abacusCtrl.beadLines; i++) {
            var x = -35 + abacusCtrl.beadLines * abacusCtrl.beadSpacing - i * abacusCtrl.beadSpacing;
            var y = 20 + (abacusCtrl.beadPerLine + 2) * abacusCtrl.beadHeight;
            ctx.beginPath();
            ctx.moveTo(x, 20);
            ctx.lineTo(x, y);
            ctx.stroke();
          }
          for (var j = 0; j < 3; j++) {
            var y = 20;
            if (j === 1) y = 20 + (abacusCtrl.beadPerLine - abacusCtrl.beadSep) * abacusCtrl.beadHeight;
            if (j === 2) y = 20 + (abacusCtrl.beadPerLine + 2) * abacusCtrl.beadHeight;
            ctx.beginPath();
            ctx.moveTo(20, y);
            ctx.lineTo(640, y);
            ctx.stroke();
          }
          ctx.lineWidth = 1;

          drawBeads(ctx);

          ctx.fillStyle = "rgba(0, 0, 0, 1.0)";
          ctx.textAlign = 'center';
          ctx.font = '20pt sans-serif';
          var textY = 50 + (abacusCtrl.beadPerLine + 2) * abacusCtrl.beadHeight;
          for (var i = 0; i < abacusCtrl.beadLines; i++) {
            var textX = -30 + abacusCtrl.beadLines * abacusCtrl.beadSpacing - i * abacusCtrl.beadSpacing;
            var valueSum = 0;
            for (var j = 0; j < abacusCtrl.beadPerLine; j++) {
              var n = i * abacusCtrl.beadPerLine + j;
              if (abacusCtrl.nodes[n].active) {
                valueSum += abacusCtrl.nodes[n].value;
              }
            }
            ctx.fillText(valueSum, textX, textY);
          }
        };

        function drawRoundRectFilled(ctx, x, y, width, height, radius) {
          var borderRadius = (width > height ? height * 0.66 : width * 0.66); // Border radius as 66% of the smallest dimension

          if (typeof borderRadius === "undefined") {
            borderRadius = 5;
          }
          ctx.beginPath();
          ctx.moveTo(x + borderRadius, y);
          ctx.lineTo(x + width - borderRadius, y);
          ctx.quadraticCurveTo(x + width, y, x + width, y + borderRadius);
          ctx.lineTo(x + width, y + height - borderRadius);
          ctx.quadraticCurveTo(x + width, y + height, x + width - borderRadius, y + height);
          ctx.lineTo(x + borderRadius, y + height);
          ctx.quadraticCurveTo(x, y + height, x, y + height - borderRadius);
          ctx.lineTo(x, y + borderRadius);
          ctx.quadraticCurveTo(x, y, x + borderRadius, y);
          ctx.closePath();
          ctx.fill();
        }

        function canvasMouseDown(event) {
          var mousePos = getMousePos(canvas, event);
          for (var i = 0; i < uiElements.length; i++) {
            var dn = uiElements[i];
            if (dn.type === 0) {
              if (mousePos.x >= dn.x && mousePos.y >= dn.y && mousePos.x <= dn.x2 && mousePos.y <= dn.y2) {
                abacusCtrl.activated(dn.ref);
                break;
              }
            }
          }
          that.update();
        }

        function canvasMouseMove(event) {
          var mousePos = getMousePos(canvas, event);
          hooveredBead = -1;
          for (var i = 0; i < uiElements.length; i++) {
            var dn = uiElements[i];
            if (dn.type === 0) {
              if (mousePos.x >= dn.x && mousePos.y >= dn.y && mousePos.x <= dn.x2 && mousePos.y <= dn.y2) {
                hooveredBead = dn.ref;
                break;
              }
            }
          }
          that.update();
        }

        function canvasMouseUp(event) {}

        function getMousePos(canvas, event) {
          var rect = canvas.getBoundingClientRect();
          return {
            x: event.clientX - rect.left,
            y: event.clientY - rect.top
          };
        }
      }
    </script>
  </body>
</html>
