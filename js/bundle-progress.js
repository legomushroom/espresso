;(function ($, undefined) {

  var main = {
    init: function () {
      this.vars(); this.initEvents(); this.loop();
    },
    vars: function () {
      this.mainSelector   =  '[id^=vw_widget_bundle_progress]';
      this.$widget        = $(this.mainSelector);
      this.$menuItems     = $(this.mainSelector + ' #js-bundle-progress-item');
      this.$progressbars  = $(this.mainSelector + ' #js-bundle-progress-progressbar');
      this.$posts         = $('.vw-main-post');
      this.$w             = $(window);
      this.$htmlBody      = $('html, body');
      this.wHeight        = this.$w.height();
      this.loop           = this.loop.bind(this);

      this.getDimentions();
    },
    getDimentions: function () {
      this.dimentions = [];
      this.$posts.each(function (i, item) {
        var $item = $(item);
        var pos = $item.offset();
        var $menuItem = this.$menuItems.eq(i);
        this.dimentions.push({
          start:        pos.top,
          height:       $item.outerHeight(),
          $item:        $item,
          $menuItem:    $menuItem,
          $progressbar: this.$progressbars.eq(i),
          url:          $menuItem.data().url,
          name:         $menuItem.data().name,
          index:        i
        });
      }.bind(this));
    },

    initEvents: function () {
      var it = this;
      $(document.body).on('click', '#js-bundle-progress-item', function (e) {
        if (!e.metaKey) {
          e.preventDefault(); it.scrollTo($(this).data().index);
        }
      });
    },

    scrollTo: function (i) {
      var item = this.dimentions[i];
      this.$htmlBody.animate({ scrollTop: item.start - this.wHeight/3 + 10 });
    },

    checkWidgetDisplay: function () {
      var scrollY = window.pageYOffset||document.scrollTop||document.body.scrollTop;

      if (scrollY === this.previousScrollY) { return; }
      this.previousScrollY = scrollY;

      this.currentItem = this.getCurrentItem(scrollY);

      if (this.currentItem !== this.previousItem) {
        (this.previousItem) && this.previousItem.$menuItem.removeClass('is-check');
        this.currentItem.$menuItem.addClass('is-check');
        this.setRead(this.currentItem.index);

        window.history && window.history.replaceState({}, '', this.currentItem.url);

        document.title = this.currentItem.name + ' | commentary';

        this.previousItem = this.currentItem;
      }

      this.setProgress(this.currentItem, scrollY);
    },

    setProgress: function (currentItem, scrollY) {
      var delta = scrollY - (currentItem.start - this.wHeight/3);
      if (delta < 0) {
        if (currentItem.index === 0) {
          currentItem.$progressbar.css({ 'transform': 'scaleX(' + 0 + ')' });
        }
        return;
      }

      var percent = Math.min(delta/currentItem.height, 1);
      currentItem.$progressbar.css({ 'transform': 'scaleX(' + percent + ')' });
    },

    setRead: function (index) {
      for (var i = 0; i < this.dimentions.length; i++) {
        if (i < index) {
          this.dimentions[i].$menuItem.addClass('is-read');
        } else {
          this.dimentions[i].$menuItem.removeClass('is-read');
          this.dimentions[i].$progressbar.css({ 'transform': 'scaleX(' + 0 + ')' });
        }
      };
    },

    getCurrentItem: function (scrollY) {
      var item = this.dimentions[0];
      for (var i = 0; i < this.dimentions.length; i++) {
        if (scrollY > this.dimentions[i].start - this.wHeight/3) {
          item = this.dimentions[i];
        } else {
          break;
        }
      };
      return item;
    },
    loop: function () {
      this.checkWidgetDisplay();
      requestAnimationFrame(this.loop);
    }
  };

  setTimeout(function () {
    main.init();
  }, 1000);
  
})(window.jQuery || window.Zepto);