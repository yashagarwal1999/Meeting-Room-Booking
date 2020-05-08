<?xml version = "1.0" encoding = "UTF-8"?> 
<xsl:stylesheet version = "1.0" 
   xmlns:xsl = "http://www.w3.org/1999/XSL/Transform">  
<!-- <html>
<head></head>
<body>
<xsl:value-of select="sitemap/heading">
</body>
</html> -->
<!-- <h1>Y</h1> -->
   <xsl:import href = "style_sitemap.xsl"/>  
   <xsl:template match = "/"> 
      <xsl:apply-imports/> 
   </xsl:template>  
</xsl:stylesheet> 