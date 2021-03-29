UPDATE epitome_invocation_x SET id=0 WHERE id=12;
UPDATE epitome_invocation_x SET id=12 WHERE id=28;
UPDATE epitome_invocation_x SET id=28 WHERE id=0;

UPDATE table_name SET id=0 WHERE id=$pindah1;
UPDATE table_name SET id=$pindah1 WHERE id=$pindah2;
UPDATE table_name SET id=$pindah2 WHERE id=0;

UPDATE table_name SET id=id+1 WHERE id>=1 ORDER BY id DESC;