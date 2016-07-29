// ----- Custom function ------
$(document).ready(function(){
  if($(document).width() < 768){
    // $('.xplorlogo').css('padding-left', '60px');
    // $('.xplorlogo').css('width', '80%');
    // $('.xplorlogo').css('position', 'absolute');
    $('.xplorlogo').addClass('custom-app');
  }else{
    $('.xplorlogo').removeClass('custom-app');
  }

  $logoW = $(document).width() - $('#loginPane').width();

  $('.logoPane').css('width', $logoW + 'px');

  $('#logoCover').css('margin-top', (($(document).height()/2) - ($('#coverImage').height()/2) - 100) + 'px');
});

var xpl_custom_function = {
  common_redirect: function(url){
    window.location = url;
  },
  confirm_redirect: function(url){
    swal({
      title: "Are you sure?",
       text: "You will not be able to recover this imaginary file!",
       type: "warning",
       showCancelButton: true,
       confirmButtonColor: "#DD6B55",
       confirmButtonText: "Yes, delete it!",
       closeOnConfirm: false
     }, function(){
       window.location = url;
     });

  }
}

// ----- Function for checking number value -----
function xpl_num(x){
  return x === null ? NAN : +x;
}

// -----  Function for checking number type -----
function xpl_checknumeric(x) {
    return !isNaN(x);
}

// ----- Ordering function -----
var xpl_ordering = {
  xpl_asc: function(a, b) {
    return a < b ? -1 : a > b ? 1 : a >= b ? 0 : NaN;
  },
  xpl_desc: function(a, b) {
    return b < a ? -1 : b > a ? 1 : b >= a ? 0 : NaN;
  }
}

// ----- XPL Basic Math function -----
var xpl_math = {
  sum: function(array){
    var s = 0, n = array.length, a, i = -1;
    if (arguments.length === 1) {
      while (++i < n) if (xpl_checknumeric(a = +array[i])) s += a;
    } else {
      while (++i < n) if (xpl_checknumeric(a = +f.call(array, array[i], i))) s += a;
    }
    return s;
  },

  mean: function(array) {
    var s = 0, n = array.length, a, i = -1, j = n;
    if (arguments.length === 1) {
      while (++i < n) if (xpl_checknumeric(a = xpl_num(array[i]))) s += a; else --j;
    } else {
      while (++i < n) if (xpl_checknumeric(a = xpl_num(f.call(array, array[i], i)))) s += a; else --j;
    }
    if (j) return s / j;
  },

  quantile: function(values, p) {
    var H = (values.length - 1) * p + 1, h = Math.floor(H), v = +values[h - 1], e = H - h;
    return e ? v + e * (values[h] - v) : v;
  },

  median: function(array) {
    var numbers = [], n = array.length, a, i = -1;
    if (arguments.length === 1) {
      while (++i < n) if (xpl_checknumeric(a = xpl_num(array[i]))) numbers.push(a);
    } else {
      while (++i < n) if (xpl_checknumeric(a = xpl_num(f.call(array, array[i], i)))) numbers.push(a);
    }
    if (numbers.length) return xpl_mathfunction.quantile(numbers.sort(xpl_ordering.xpl_asc), .5);
  },

  min: function(array, fx) {
    var i = -1, n = array.length, a, b;
    if (arguments.length === 1) {
      while (++i < n) if ((b = array[i]) != null && b >= b) {
        a = b;
        break;
      }
      while (++i < n) if ((b = array[i]) != null && a > b) a = b;
    } else {
      while (++i < n) if ((b = fx.call(array, array[i], i)) != null && b >= b) {
        a = b;
        break;
      }
      while (++i < n) if ((b = fx.call(array, array[i], i)) != null && a > b) a = b;
    }
    return a;
  },

  max: function(array, fx) {
    var i = -1, n = array.length, a, b;
    if (arguments.length === 1) {
      while (++i < n) if ((b = array[i]) != null && b >= b) {
        a = b;
        break;
      }
      while (++i < n) if ((b = array[i]) != null && b > a) a = b;
    } else {
      while (++i < n) if ((b = fx.call(array, array[i], i)) != null && b >= b) {
        a = b;
        break;
      }
      while (++i < n) if ((b = fx.call(array, array[i], i)) != null && b > a) a = b;
    }
    return a;
  },

  extent: function(array, fx) {
    var i = -1, n = array.length, a, b, c;
    if (arguments.length === 1) {
      while (++i < n) if ((b = array[i]) != null && b >= b) {
        a = c = b;
        break;
      }
      while (++i < n) if ((b = array[i]) != null) {
        if (a > b) a = b;
        if (c < b) c = b;
      }
    } else {
      while (++i < n) if ((b = fx.call(array, array[i], i)) != null && b >= b) {
        a = c = b;
        break;
      }
      while (++i < n) if ((b = fx.call(array, array[i], i)) != null) {
        if (a > b) a = b;
        if (c < b) c = b;
      }
    }
    return [ a, c ];
  },

  variance: function(array, fx) {
    var n = array.length, m = 0, a, d, s = 0, i = -1, j = 0;
    if (arguments.length === 1) {
      while (++i < n) {
        if (xpl_checknumeric(a = xpl_num(array[i]))) {
          d = a - m;
          m += d / ++j;
          s += d * (a - m);
        }
      }
    } else {
      while (++i < n) {
        if (xpl_checknumeric(a = xpl_num(fx.call(array, array[i], i)))) {
          d = a - m;
          m += d / ++j;
          s += d * (a - m);
        }
      }
    }
    if (j > 1) return s / (j - 1);
  },

  deviation: function() {
    var v = d3.variance.apply(this, arguments);
    return v ? Math.sqrt(v) : v;
  }
}
