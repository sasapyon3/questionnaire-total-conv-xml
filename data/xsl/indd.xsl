<?xml version="1.0" encoding="UTF-8"?><!-- DWXMLSource="kr_indesign.xsl" --><!DOCTYPE xsl:stylesheet  [
        <!ENTITY nbsp   "&#160;">
        <!ENTITY copy   "&#169;">
        <!ENTITY reg    "&#174;">
        <!ENTITY trade  "&#8482;">
        <!ENTITY mdash  "&#8212;">
        <!ENTITY ldquo  "&#8220;">
        <!ENTITY rdquo  "&#8221;">
        <!ENTITY pound  "&#163;">
        <!ENTITY yen    "&#165;">
        <!ENTITY euro   "&#8364;">
        ]>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:output method="xml" encoding="UTF-8" standalone="yes"/>
    <xsl:template match="/">
        <Root>
            <ストーリー><xsl:apply-templates/></ストーリー>
        </Root>
    </xsl:template>

    <xsl:template match="syllabus"><xsl:for-each select="./item"><表 xmlns:aid="http://ns.adobe.com/AdobeInDesign/4.0/" aid:table="table" aid:trows="5" aid:tcols="4"><セル aid:table="cell" aid:crows="2" aid:ccols="1" aid:ccolwidth="25.511811023622048"><A-1>ブース</A-1> <A-1_booth><xsl:value-of select="./boothNo"/></A-1_booth></セル><A-2_name aid:table="cell" aid:crows="2" aid:ccols="1" aid:ccolwidth="155.90551181102364"><xsl:value-of select="./company_name_display"/></A-2_name><A-3 aid:table="cell" aid:crows="1" aid:ccols="1" aid:ccolwidth="48.89763779527559">業 種</A-3><A-4 aid:table="cell" aid:crows="2" aid:ccols="1" aid:ccolwidth="36.14173228346457">□参加したい □参加した</A-4><A-3_gyosyu aid:table="cell" aid:crows="1" aid:ccols="1" aid:ccolwidth="48.89763779527559"><xsl:value-of select="./industry_type_1"/></A-3_gyosyu><セル aid:table="cell" aid:crows="1" aid:ccols="4"><B-1>設　　　　立：</B-1><B-1_seturitu><xsl:value-of select="./established"/></B-1_seturitu> <B-2>従業員数：</B-2><B-2_jyugyoin><xsl:value-of select="./number_of_employees"/></B-2_jyugyoin> <B-3>勤務予定地：</B-3><B-3_kinmuti><xsl:value-of select="./work_location"/></B-3_kinmuti> <B-4>採用予定人数：</B-4><B-4_saiyo><xsl:value-of select="./employment_number"/></B-4_saiyo> <B-5>募集職種：</B-5><B-5_bosyu><xsl:value-of select="./employment_type"/></B-5_bosyu> <B-6>OB・OG在籍者数：</B-6><B-6_OBOG><xsl:value-of select="./ob_og1"/></B-6_OBOG> <B-7_rogo>   <B-7_rogo><xsl:attribute name="href">file:///Users/yuasa/Desktop/%e6%88%90%e5%9f%8e%e5%a4%a7%2020%e3%80%90%e5%90%88%e5%90%8c%e8%aa%ac%e6%98%8e%e4%bc%9a%e5%86%8a%e5%ad%90%e3%80%91/images/<xsl:value-of select="./logo_name"/>.psd</xsl:attribute></B-7_rogo> </B-7_rogo><B-7_rogo></B-7_rogo><C-1>【事業内容】　</C-1><C-1_jigyo><xsl:value-of select="./description"/></C-1_jigyo> <C-2>【自社ＰＲ】　</C-2><C-2_PR><xsl:value-of select="./pr"/></C-2_PR> <C-3>【選考ステップ】　</C-3><C-3_senko><xsl:value-of select="./step"/></C-3_senko></セル><セル aid:table="cell" aid:crows="1" aid:ccols="4"><D>みなさんへのメッセージ　</D><D_message><xsl:value-of select="./message"/></D_message></セル><セル aid:table="cell" aid:crows="1" aid:ccols="4"><E-1_jyusho>〒<xsl:value-of select="./postal_code"/>&#160;<xsl:value-of select="./address"/></E-1_jyusho> <E-2>〈採用HP〉</E-2><E-2_HP><xsl:value-of select="./url"/></E-2_HP></セル></表></xsl:for-each></xsl:template>
</xsl:stylesheet>
