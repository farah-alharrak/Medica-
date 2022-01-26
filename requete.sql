select COUNT(*) 
from rdv 
where extract(month from date_debut) = 1 ; 