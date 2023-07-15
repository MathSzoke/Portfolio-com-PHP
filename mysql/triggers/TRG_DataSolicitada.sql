DROP EVENT IF EXISTS CodigoExpirado;

CREATE EVENT CodigoExpirado
    ON SCHEDULE EVERY 2 SECOND
    DO
      UPDATE EsqueciSenha es SET es.Expirado = 1, es.Acao = 'Expirado' WHERE es.HoraExpira < TIME(CURRENT_TIME()) and es.UsuarioID = 21;
      
      
show processlist;PROC_DataSolicitada
SELECT @@EVENT_SCHEDULER;
SET GLOBAL event_scheduler = 1;
