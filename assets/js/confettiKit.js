(function () {
  window.confettiKit = function (params) {
    var app = this;
    app.version = "1.1.0";
    app.config = {
      colors: [
        '#a864fd',
        '#29cdff',
        '#78ff44',
        '#ff718d',
        '#fdff6a',
      ],
      el: 'body',
      elements: {
        'confetti': {
          direction: 'down',
          rotation: true,
        },
        'star': {
          count: 15,
          direction: 'up',
          rotation: true,
        },
        'ribbon': {
          count: 10,
          direction: 'down',
          rotation: true,
        },

      },
      confettiCount: 75,
      x: 0,
      y: 0,
      angle: 90,
      decay: 0.9,
      spread: 45,
      startVelocity: 45,
      position: null,
    }
    // Extend defaults with parameters
    for (var param in params) {
      app.config[param] = params[param];
    }
    var config = app.config;

    app.renderStar = function (width, color) {
      return '<div style="width:' + width + 'px;fill:' + color + '"><svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 75 75" ><title>star</title><polygon points="37.5 18.411 56.342 8.505 52.743 29.486 67.987 44.345 46.921 47.406 37.5 66.495 28.079 47.406 7.013 44.345 22.257 29.486 18.658 8.505 37.5 18.411" /></svg></div>';
    }

    app.renderRibbon = function (width, color) {
      return '<div style="width:' + width + 'px;stroke:' + color + '"><svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 75 75" ><path d="m24.453125,3.774663c0.193689,-0.193689 0.743394,-0.671232 1.743199,-0.968444c0.94668,-0.28142 2.333125,-0.396423 4.648531,-0.193689c3.330842,0.291645 6.861105,1.826145 7.941241,2.711643c1.270993,1.041963 2.540047,2.890054 3.873776,4.84222c1.575816,2.306511 2.817321,4.217926 3.486399,6.004353c0.924008,2.467092 1.294523,4.846337 1.162133,6.972797c-0.097034,1.558552 -0.857702,3.568397 -1.743199,4.648531c-1.041962,1.270991 -2.406342,2.560381 -4.261154,3.29271c-2.228395,0.87983 -4.466154,0.810093 -6.779108,0.581066c-1.965634,-0.194637 -3.568395,-0.857702 -4.648531,-1.743199c-0.211833,-0.17366 -0.533673,-0.606635 -0.968444,-1.355822c-0.350522,-0.604015 -0.818174,-1.325931 -0.774755,-1.936888c0.030701,-0.432012 0.413426,-1.271858 0.968444,-1.936888c0.620528,-0.743524 1.284527,-0.912889 1.936888,-1.162133c1.279386,-0.488809 3.691399,-0.422715 6.004353,-0.193689c1.965634,0.194637 3.31667,0.736573 4.261154,1.355822c1.393387,0.91357 2.991613,1.63628 4.454843,2.905332c1.03466,0.897355 2.019835,2.599953 2.905332,3.680087c0.694641,0.847327 1.193205,1.542398 1.355822,2.324266c0.239907,1.153479 0.535004,2.743879 0,6.58542c-0.356447,2.55943 -1.282205,4.880811 -2.324266,6.779108c-1.086946,1.980061 -2.178706,3.113269 -3.486399,3.873776c-1.43055,0.831959 -3.243129,1.2571 -5.810664,1.54951c-2.886673,0.328756 -6.579154,-0.410019 -7.941241,-0.774755c-0.771421,-0.20657 -1.049573,-0.27482 -1.355822,-0.581066c-0.612498,-0.612498 -0.774755,-1.54951 -0.774755,-2.517955c0,-0.774755 -0.059414,-1.775875 0.387378,-2.517955c0.859423,-1.427419 2.413861,-2.195096 4.067465,-2.711643c1.307291,-0.408368 2.573952,-0.18426 3.486399,0.193689c1.29039,0.534498 3.294961,1.907296 4.648531,3.29271c1.164388,1.191782 1.717201,2.44142 2.711643,4.84222c0.703176,1.697624 1.065142,3.478355 1.162133,5.229598c0.10711,1.933923 0.089293,3.896049 -0.387378,5.616976c-0.326992,1.180547 -0.698642,2.16461 -1.162133,3.099021c-0.50186,1.011759 -1.936888,2.905332 -3.29271,4.261154c-1.162133,1.162133 -2.324266,1.54951 -3.29271,1.936888l-0.581066,0.193689" id="svg_6" stroke-width="4" fill="none"/></svg></div>';
    }

    app.customRender = function (content, type, color, width, size) {
      if (type == "text") {
        return '<p style="color:' + color + ';font-size:' + size + 'px">' + content + '</p>';
      } else if (type == "svg") {
        return '<div style="width:' + width + 'px;fill:' + color + '">' + content + '</div>';
      } else if (type == "image") {
        return '<img style="width:' + width + 'px;" src="' + content + '"/>';
      }
    }

    app.createElements = function (root, elementCount) {
      var starCount = config.elements["star"] ? config.elements["star"].count : 0;
      var ribbonCount = config.elements["ribbon"] ? config.elements["ribbon"].count : 0;
      //var customCount = config.elements["custom"] ? config.elements["custom"].count : 0;
      var customCount = [];

      if (config.elements["custom"] && config.elements["custom"].length > -1) {
        console.log(config.elements["custom"].length)
        for (var i = 0; i <= config.elements["custom"].length; i++) {
          if (config.elements["custom"][i]) {
            customCount.push({
              'count': config.elements["custom"][i]['count']
            })
          }
        }
      }
      var cl = 0;
      var all = []
      for (var index = 0; index <= elementCount; index++) {
        var element = document.createElement('div');
        element.classList = ['fetti'];
        var color = config.colors[index % config.colors.length];
        var w = Math.floor((Math.random() * 10) + 1) + 'px';
        var h = Math.floor((Math.random() * 10) + 1) + 'px';
        element.style.width = w;
        element.style.height = h;
        element.style.position = 'fixed';
        element.style.zIndex = "999999";

        if (config.elements["star"] && starCount > 0) {
          var s = starCount - 1
          if (s <= config.elements["star"].count && s >= 0) {
            element.style['background-color'] = "";
            element.innerHTML = app.renderStar(25, color);

            element.direction = config.elements["star"].direction;
            element.rotation = config.elements["star"].rotation;
            starCount = s
          }
        } else if (config.elements["ribbon"] && ribbonCount > 0) {
          var r = ribbonCount - 1
          if (r <= config.elements["ribbon"].count && r >= 0) {
            element.style['background-color'] = "";
            element.innerHTML = app.renderRibbon(30, color);

            element.direction = config.elements["ribbon"].direction;
            element.rotation = config.elements["ribbon"].rotation;
            ribbonCount = r
          }
        }
        else if (config.elements["custom"] && config.elements["custom"].length > -1 && customCount[cl]) {
          if (customCount[cl]) {
            var c = customCount[cl].count - 1
            if (c <= customCount[cl].count) {
              if (c <= customCount[cl].count && c >= 0) {
                element.style['background-color'] = "";
                var type = config.elements["custom"][cl].contentType;
                var content = config.elements["custom"][cl].content;
                var width = config.elements["custom"][cl].width;
                var textSize = config.elements["custom"][cl].textSize;
                element.innerHTML = app.customRender(content, type, color, width, textSize);

                element.direction = config.elements["custom"][cl].direction;
                element.rotation = config.elements["custom"][cl].rotation;
                customCount[cl].count = c
                if (customCount[cl].count == 0) {
                  cl++;
                }
              }
            }
          }


        }

        else {
          if (w == h) {
            element.style['background-color'] = color;
            element.style.borderRadius = "50%";
          } else {
            element.style['background-color'] = color;
          }

          element.direction = config.elements["confetti"] ? (config.elements["confetti"].direction ? config.elements["confetti"].direction : 'down') : 'down';
          element.rotation = config.elements["confetti"] ? (config.elements["confetti"].rotation ? config.elements["confetti"].rotation : true) : true;
        }

        //root.prepend(element);
        root.insertBefore(element, root.firstChild); //older browser
        all.push(element)
      }
      return all;
    }
    app.randomPhysics = function (x, y, angle, spread, startVelocity) {
      var radAngle = angle * (Math.PI / 180);
      var radSpread = spread * (Math.PI / 180);
      return {
        x: x,
        y: y,
        wobble: Math.random() * 10,
        velocity: (startVelocity * 0.3) + (Math.random() * startVelocity),
        angle2D: -radAngle + ((0.3 * radSpread) - (Math.random() * radSpread)),
        angle3D: -(Math.PI / 4) + (Math.random() * (Math.PI / 2)),
        tiltAngle: Math.random() * Math.PI
      };
    }

    app.updateFetti = function (fetti, progress, decay) {
      fetti.physics.x += Math.cos(fetti.physics.angle2D) * fetti.physics.velocity;
      fetti.physics.y += Math.sin(fetti.physics.angle2D) * fetti.physics.velocity;
      fetti.physics.z += Math.sin(fetti.physics.angle3D) * fetti.physics.velocity;
      fetti.physics.wobble += 0.1;
      fetti.physics.velocity *= decay;
      if (fetti.element.direction == "up") {
        fetti.physics.y -= 3;
      } else {
        fetti.physics.y += 3;
      }

      fetti.physics.tiltAngle += 0.1;
      var x = fetti.physics.x,
        y = fetti.physics.y,
        tiltAngle = fetti.physics.tiltAngle,
        wobble = fetti.physics.wobble;
      var wobbleX = x + (10 * Math.cos(wobble));
      var wobbleY = y + (10 * Math.sin(wobble));
      var transform;
      if (fetti.element.rotation) {
        transform = 'translate3d(' + wobbleX + 'px, ' + wobbleY + 'px, 0) rotate3d(1, 1, 1, ' + tiltAngle + 'rad)';
      } else {
        transform = 'translate3d(' + wobbleX + 'px, ' + wobbleY + 'px, 0)';
      }
      fetti.element.style.transform = transform;
      fetti.element.style.opacity = 1 - progress;

    }

    app.animate = function (root, fettis, decay) {
      var totalTicks = 200;
      var tick = 0;

      function update() {
        fettis.forEach(function (fetti) {
          app.updateFetti(fetti, tick / totalTicks, decay);
        });

        tick += 1;
        if (tick < totalTicks) {
          requestAnimationFrame(update);
        } else {
          fettis.forEach(function (fetti) {
            root.removeChild(fetti.element);
          });
        }
      }

      requestAnimationFrame(update);
    }
    app.confetti = function (root, x, y) {
      angle = config.angle,
        decay = config.decay,
        spread = config.spread,
        startVelocity = config.startVelocity,
        elementCount = config.confettiCount
      var elements = app.createElements(root, elementCount);
      var fettis = [];
      elements.map(function (element) {
        var s = {
          'element': element,
          'physics': app.randomPhysics(x, y, angle, spread, startVelocity)
        }
        fettis.push(s);
      });
      app.animate(root, fettis, decay);
    }
    var attach = document.querySelector(config.el)

    if (config.position != null) {
      if (config.position == "bottomLeftRight") {
        config.angle = 45;
        app.confetti(attach, 0, window.innerHeight - 200);
        var rightConfig = params;
        rightConfig['position'] = null;
        rightConfig['angle'] = 135;
        rightConfig['x'] = window.innerWidth;
        rightConfig['y'] = window.innerHeight - 200;
        new confettiKit(rightConfig);
      } else if (config.position == "topLeftRight") {
        config.angle = 340;
        app.confetti(attach, 0, 0);
        var rightConfig = params;
        rightConfig['position'] = null;
        rightConfig['angle'] = 190;
        rightConfig['x'] = window.innerWidth;
        rightConfig['y'] = 0;
        new confettiKit(rightConfig);
      }

    } else {
      app.confetti(attach, config.x, config.y);
    }
  };
})();