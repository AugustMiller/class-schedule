var Holiday, Snow, Flake;

Snow = function (density, intensity) {
  var self = this;
  
  self.flakes = [];
  self.options = {
    container: $('<div />').attr({'id': 'snow'}).appendTo(document.body),
    count: density,
    intensity: intensity,
    radius: 25
  };

  self.init();
};

Snow.prototype = {

  init: function () {
    var self = this;

    self.spawn(self.options.count);

    self.options.timer = window.setInterval( function ( ) {
      self.update();
    }, ( 1000 / 25 ) );

    console.log(self);
  },

  spawn: function ( count ) {
    var self = this;
    
    for ( var s = 0; s < count; s++ ) {
      self.flakes.push( new Flake(self.options.radius, self.options.intensity, self.options.container) );
    }
  },

  update: function () {
    var self = this;

    // console.log("Updating");

    for ( var s = 0; s < self.flakes.length; s++ ) {
      if ( ! self.flakes[s].move() ) self.destroy(s, true);
    }
  },

  implode: function () {
    var self = this;

    window.clearInterval(self.options.timer);

    for ( var s = 0; s < self.options.count; s++ ) {
      self.destroy(0, false);
    }
  },

  destroy: function (flake, replace) {
    var self = this,
        to_melt = ( flake !== 'undefined' ) ? flake : Math.random( Math.random() * self.flakes.length );

    console.log("Melting " + to_melt);

    // Clean up the Flake
    self.flakes[to_melt].poof();

    // Delete the array element
    delete self.flakes[to_melt];

    // Then close the gap.
    self.flakes.splice(to_melt, 1);

    // Should we replace it with another?
    if ( replace ) self.spawn(1);
  }

};


Flake = function (size, storm_strength, container) {
  var self = this;

  self.options = {
    storm: container,
    radius: Math.ceil(Math.sqrt( Math.random() * size )),
    created: Date.now(),
    horizontal_start: ( Math.random() * $(window).width() ),
    vertical_start: ( Math.random() * $(window).height() ),
    multiplier: ( Math.random() * storm_strength ) * 500
  };

  self.position = {
    left: self.options.horizontal_start,
    top: self.options.vertical_start
  };

  self.el = $('<div />').addClass('flake').appendTo(self.options.storm);

  self.init();
}

Flake.prototype = {
  init: function () {
    var self = this;

    self.el.css({
      width: self.options.radius,
      height: self.options.radius
    });

    // console.log("A Snowflake Crystallized.");
  },

  move: function () {
    var self = this,
        now = Date.now();

    self.position = {
      left: self.position.left + Math.sin( ( ( now - self.options.created ) / self.options.multiplier ) ),
      top: self.options.vertical_start + ( ( now - self.options.created ) ) / 50
    };


    self.el.css({
      transform: 'translate3d(' + self.position.left + 'px, ' + self.position.top + 'px, 0)'
    });

    return self.isVisible();
  },

  isVisible: function () {
    var self = this;
    
    return ( self.position.top < $(window).height() ) ? true : false;
  },

  poof: function () {
    var self = this;

    self.el.remove();
  }
};



$(function () {
  Holiday = new Snow(200, 5);
});