
-- PUESTO QUE TIENE CONCEPTOS EN  MES
SELECT p.codigo_puesto FROM pago as p 
INNER JOIN (SELECT c.tipo,cp.codigo_puesto FROM comerciante_puesto as cp 
LEFT JOIN  comerciante as c  ON cp.id_comerciante=c.id
LEFT JOIN  puesto as p ON cp.codigo_puesto=p.codigo)puesto ON p.codigo_puesto=puesto.codigo_puesto
WHERE date_format(fecha_pago,'%Y-%m')='2018-01' AND puesto.tipo='socio'
GROUP BY codigo_puesto,date_format(fecha_pago,'%Y-%m');



-- CONSOLIADO DE PAGOS PUESTO  SOCIO Y CONCEPTO POR MES(INCLUYE TODOS LOS SOCIOS)
SELECT p.codigo_puesto,puesto.estado,puesto.tipo_puesto,puesto.nombres,puesto.apellidos,
puesto.tipo_socio,p.id_concepto,concepto.descripcion,sum(p.costo)costo,sum(p.pago)pago,
p.tipo,p.fecha_pago,p.fecha_vencimiento
 FROM pago as p
INNER JOIN (SELECT cp.id_comerciante,c.nombres,c.apellidos,c.tipo as tipo_socio,cp.codigo_puesto,p.estado,p.tipo as tipo_puesto FROM comerciante_puesto as cp 
INNER JOIN  comerciante as c  ON cp.id_comerciante=c.id
INNER JOIN  puesto as p ON cp.codigo_puesto=p.codigo)AS puesto ON p.codigo_puesto=p.codigo_puesto
INNER JOIN (SELECT id,descripcion FROM concepto) as concepto ON p.id_concepto=concepto.id
WHERE DATE_FORMAT(p.fecha_pago,'%Y-%m')='2018-01' and puesto.tipo_socio='socio'
GROUP BY codigo_puesto,id_concepto;

-- CONSOLIADO DE PAGOS PUESTO  SOCIO Y CONCEPTO POR MES(FILTRADO POR UN SOCIO)
SELECT p.codigo_puesto,puesto.estado,puesto.tipo_puesto,puesto.nombres,puesto.apellidos,
puesto.tipo_socio,p.id_concepto,concepto.descripcion,sum(p.costo)costo,sum(p.pago)pago,p.tipo,p.fecha_pago,p.fecha_vencimiento
 FROM pago as p
INNER JOIN (SELECT cp.id_comerciante,c.nombres,c.apellidos,c.tipo as tipo_socio,cp.codigo_puesto,p.estado,p.tipo as tipo_puesto FROM comerciante_puesto as cp 
INNER JOIN  comerciante as c  ON cp.id_comerciante=c.id
INNER JOIN  puesto as p ON cp.codigo_puesto=p.codigo)AS puesto ON p.codigo_puesto=p.codigo_puesto
INNER JOIN (SELECT id,descripcion FROM concepto) as concepto ON p.id_concepto=concepto.id
WHERE DATE_FORMAT(p.fecha_pago,'%Y-%m')='2018-01' AND p.codigo_puesto=1
GROUP BY codigo_puesto,id_concepto,DATE_FORMAT(p.fecha_pago,'%Y-%m');


-- PAGO DIARIO POR SOCIO
SELECT p.codigo_puesto,puesto.estado,puesto.tipo_puesto,puesto.nombres,puesto.apellidos,
puesto.tipo_socio,p.id_concepto,concepto.descripcion,sum(p.costo)costo,sum(p.pago)pago,p.tipo,p.fecha_pago,p.fecha_vencimiento
 FROM pago as p
INNER JOIN (SELECT cp.id_comerciante,c.nombres,c.apellidos,c.tipo as tipo_socio,cp.codigo_puesto,p.estado,p.tipo as tipo_puesto FROM comerciante_puesto as cp 
INNER JOIN  comerciante as c  ON cp.id_comerciante=c.id
INNER JOIN  puesto as p ON cp.codigo_puesto=p.codigo)AS puesto ON p.codigo_puesto=p.codigo_puesto
INNER JOIN (SELECT id,descripcion FROM concepto) as concepto ON p.id_concepto=concepto.id
WHERE p.fecha_pago='2018-01-01'
GROUP BY codigo_puesto,id_concepto,p.fecha_pago;


-- CONCEPTOS
SELECT descripcion FROM concepto;


-- ASOCIACIÓN DE PUESTO Y COMERCIANTE
SELECT cp.id_comerciante,c.nombres,c.apellidos,c.tipo,cp.codigo_puesto,p.estado,p.tipo FROM comerciante_puesto as cp 
LEFT JOIN  comerciante as c  ON cp.id_comerciante=c.id
LEFT JOIN  puesto as p ON cp.codigo_puesto=p.codigo


-- TOTAL DE COMERCIANTES
SELECT count(*) FROM comerciante


-- TOTAL POR CONCEPTO DEFINIDO POR MES
SELECT tc.descripcion concepto,tc.costo,tc.pago,tc.fecha FROM (SELECT id,descripcion,IFNULL(p.costo,0.00)costo,IFNULL(p.pago,0.00)pago,
date_format(p.fecha,'%Y-%m')fecha FROM concepto as c 
LEFT JOIN (SELECT p.id_concepto,SUM(p.costo)costo,SUM(p.pago)pago,fecha,p.tipo FROM pago as p 
WHERE date_format(p.fecha,'%Y-%m')='2018-01' 
GROUP BY p.id_concepto,date_format(p.fecha,'%Y-%m'))as p 
ON c.id=p.id_concepto)as tc  where fecha is not null order by descripcion;


-- CONSOLIDADO DE EGRESOS DE CAJA POR MES
SELECT sum(monto)monto,id_documento,d.descripcion,e.fecha_registro FROM egresos_caja as e 
INNER JOIN documento_interno as d ON e.id_documento=d.id
WHERE date_format(fecha_registro,'%Y-%m')='2018-01'
group by id_documento ORDER BY d.descripcion;
