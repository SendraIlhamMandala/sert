<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html  PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
      "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"
      xmlns:svg="http://www.w3.org/2000/svg"
      xmlns:xlink="http://www.w3.org/1999/xlink">
  <head>
    <title>SVGKit Minimal</title>

    <!-- START Required for IE to support  inlined SVG -->
    <object id="AdobeSVG" width="1" height="1" classid="clsid:78156a80-c6a1-4bbf-8e6a-3cd390eeb4e2"></object>
    <?import namespace="svg" implementation="#AdobeSVG"?>
    <!-- END   Required for IE to support inlined SVG -->

    <script type="text/javascript" src="https://svgkit.sourceforge.net/MochiKit/MochiKit.js"></script>

    <script type="text/javascript" src="https://svgkit.sourceforge.net/SVGKit/SVGKit.js" ></script>

    <script type="text/javascript">
    var example = function() {
      var svg = new SVGKit(window.innerWidth, window.innerHeight);

      var img = new Image();
img.src = '/image/sertifikat2.svg';
    var svgImg = svg.IMAGE({x: 0, y: 0, width: 1000, height: 1000, href: img.src});
    svg.append(svgImg);
// insert text
var txt = svg.TEXT({x: 500, y: 500, fill: 'black', 'text-anchor': 'middle'}, "test text");
svg.append(txt);

appendChildNodes('mydiv', svg.htmlElement);
    }
    addLoadEvent(example);
    </script>

  </head>

  <body>

    <h2>SVGKit Minimal HTML File</h2>

    <div id="mydiv">
    </div>
    
  </body>
</html>