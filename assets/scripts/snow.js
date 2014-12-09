var Holiday, Snow, Flake;

Snow = function (density, intensity) {
  var self = this;
  
  self.flakes = [];
  self.options = {
    container: $('<div />').attr({'id': 'snow'}).appendTo(document.body),
    count: density,
    intensity: intensity,
    radius: 15
  };

  self.init();
};

Snow.prototype = {

  init: function () {
    var self = this;

    self.spawn(self.options.count);

    window.setInterval( function ( ) {
      self.update();
    }, 50);

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
      if ( ! self.flakes[s].move() ) self.despawn(s);
    }
  },

  implode: function () {
    var self = this;

    for ( var s = 0; s < self.flakes.length; s++ ) {
      self.despawn(s);
    }
  },

  despawn: function (flake) {
    var self = this,
        destroy = ( flake !== 'undefined' ) ? flake : ( Math.random() * self.flakes.length );

    // console.log("Removing " + destroy);

    // Clean up the Flake
    self.flakes[destroy].poof();

    // Delete the array element
    delete self.flakes[destroy];

    // Then close the gap.
    self.flakes.splice(destroy, 1);

    self.spawn(1);
  }

};


Flake = function (size, storm_strength, container) {
  var self = this;

  self.options = {
    storm: container,
    radius: Math.sqrt( Math.random() * size ),
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
      left: self.position.left,
      top: self.position.top
    });

    return ( self.isVisible() ) ? true : false;
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