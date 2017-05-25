<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0"
xmlns:scratch="http://www.w3.org/1999/xhtml">
<xsl:output method="text" indent="no" encoding="UTF-8" />
<xsl:strip-space elements="*"/>

<xsl:template match="/"> 
  <xsl:apply-templates />
</xsl:template>


<xsl:template match="scratch:next"> 
  <xsl:apply-templates select="scratch:block" />
</xsl:template>



<xsl:template match="//scratch:next/scratch:block">
  <xsl:value-of select="@type" />
  <xsl:text>(</xsl:text>
  <xsl:value-of select="./scratch:value/scratch:shadow/scratch:field"/>
  <xsl:text> </xsl:text>
  <xsl:value-of select="scratch:value/@name"/>
  <xsl:text>)
</xsl:text>
 <xsl:apply-templates select="scratch:next" />
</xsl:template> 

</xsl:stylesheet>
