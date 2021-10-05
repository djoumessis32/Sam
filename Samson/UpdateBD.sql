INSERT INTO `samson`.`menu` SET `idparent`=15,`idfils`=2,`libelle_fr`='Imprimer corespo Anonymat',`lien`='#',`fichierassocier`='F_cAnonymat.php',`dossierviews`='Examen',`titrevue`='Imprimer correspondance Anonymat';
INSERT INTO `samson`.`groupeutilisateurmenu` SET `idgroupeutilisateur`=11;
UPDATE `samson`.`groupeutilisateurmenu` SET `idmenu`=125 WHERE `idgroupeutilisateurmenu`=818;
UPDATE `samson`.`groupeutilisateurmenu` SET `nivauaccess`=1 WHERE `idgroupeutilisateurmenu`=818;
UPDATE `samson`.`menu` SET `icon`='icon-arrow-right' WHERE `idmenu`=125;
UPDATE `samson`.`menu` SET `fichierassocier`='F_cAnonymat.php' WHERE `idmenu`=125;