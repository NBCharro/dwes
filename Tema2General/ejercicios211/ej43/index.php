<?php
$patron = "#abc#";
$resultado = "awbwcw";
// CONTIENE NO
$patron = "#abc#";
$resultado = "cdabcba";
// CONTIENE SI
$patron = "#a\$b#";
$resultado = "1a$b2";
// CONTIENE NO
// Tiene que ser "#a\\\$b#"
$patron = "#[aeiou]#";
$resultado = "bic";
// CONTIENE SI
// Esta la I
$patron = "#[^aeiou]#";
$resultado = "bic";
// CONTIENE NO
// Niega y tiene la I
$patron = "#[p-t]#";
$resultado = "Svga";
// CONTIENE NO
// no tiene: p q r s t
$patron = "#^ab#";
$resultado = "cab";
// CONTIENE NO
// No empieza por a
$patron = "#ab$#";
$resultado = "cab";
// CONTIENE SI
// Acaba en ab
$patron = "#^ab$#";
$resultado = "cab";
// CONTIENE NO
// No empieza por a
$patron = "#ab*c#";
$resultado = "ac-dc";
// CONTIENE SI
// La b puede aparecer 0 o mas
$patron = "#a.c#";
$resultado = "ac-dc";
// CONTIENE NO
// No hay caracter entre a y c
$patron = "#ab{2,}c#";
$resultado = "abbbc";
// CONTIENE SI
// b aparece mas de 2 veces
$patron = "#a(bc){2}d#";
$resultado = "abcbcbcd";
// CONTIENE NO
// bc aparece 3 veces
$patron = "#^a(b|c)d$#";
$resultado = "abcd";
// CONTIENE NO
// Tiene b y c
$patron = "#^a(b|c)d$#";
$resultado = "abdd";
// CONTIENE NO
// Tiene 2 d
$patron = "#^(ab)|(cd)$#";
$resultado = "abc";
// CONTIENE SI
// Empieza por ab
$patron = "#^(ab)|(cd)$#";
$resultado = "abcd";
// CONTIENE SI
// Empieza por ab | ademas acaba por cd
$patron = "#^(ab)$|^(cd)$#";
$resultado = "abc";
// CONTIENE NO
// Ni empieza y acaba por ab NI empieza y acaba por cd
