<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:xs="http://www.w3.org/2001/XMLSchema">

    <xsl:template match="collection">

        <xsl:value-of select="xs:integer('a')" />

    </xsl:template>

</xsl:stylesheet>