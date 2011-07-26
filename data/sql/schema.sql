CREATE TABLE clase_anterior (id_solicitud INT, id_tipo_licencia INT, PRIMARY KEY(id_solicitud, id_tipo_licencia)) ENGINE = INNODB;
CREATE TABLE conjunto_examenes (id_tramite INT, id_examen INT, id_tipo_licencia INT, PRIMARY KEY(id_tramite, id_examen, id_tipo_licencia)) ENGINE = INNODB;
CREATE TABLE conjunto_requisitos (id_requisito INT, id_tramite INT, id_tipo_licencia INT, PRIMARY KEY(id_requisito, id_tramite, id_tipo_licencia)) ENGINE = INNODB;
CREATE TABLE dia_no_laboral (id_dia_no_laboral INT AUTO_INCREMENT, user_id BIGINT NOT NULL, fecha_no_laboral DATE, INDEX user_id_idx (user_id), PRIMARY KEY(id_dia_no_laboral)) ENGINE = INNODB;
CREATE TABLE examen (id_examen INT AUTO_INCREMENT, nombre_examen CHAR(40) NOT NULL, descripcion_examen TEXT, PRIMARY KEY(id_examen)) ENGINE = INNODB;
CREATE TABLE hora (id_hora INT AUTO_INCREMENT, id_solicitud INT, fecha_hora DATE NOT NULL, hora_ini TIME NOT NULL, tipo VARCHAR(20), PRIMARY KEY(id_hora)) ENGINE = INNODB;
CREATE TABLE pago (id_pago INT AUTO_INCREMENT, id_solicitud INT NOT NULL, fecha DATE, monto INT, INDEX id_solicitud_idx (id_solicitud), PRIMARY KEY(id_pago)) ENGINE = INNODB;
CREATE TABLE requisito (id_requisito INT AUTO_INCREMENT, nombre_requisito CHAR(40) NOT NULL, descripcion_requisito TEXT, PRIMARY KEY(id_requisito)) ENGINE = INNODB;
CREATE TABLE solicitud_licencia (id_solicitud INT AUTO_INCREMENT, id_tramite INT NOT NULL, rut VARCHAR(10) NOT NULL, user_id BIGINT NOT NULL, id_pago INT, id_hora INT, id_tipo_licencia INT NOT NULL, estado VARCHAR(20), fecha_ultimo_control DATE, fecha_control DATE, restriccion TINYINT, comuna_anterior VARCHAR(100), porta_licencia TINYINT, motivo_no_porta_licencia VARCHAR(200), es_donante TINYINT, INDEX id_tipo_licencia_idx (id_tipo_licencia), INDEX id_tramite_idx (id_tramite), INDEX id_hora_idx (id_hora), INDEX user_id_idx (user_id), INDEX id_pago_idx (id_pago), PRIMARY KEY(id_solicitud)) ENGINE = INNODB;
CREATE TABLE tipo_licencia (id_tipo_licencia INT AUTO_INCREMENT, nombre_tipo_licencia CHAR(20) NOT NULL, descripcion_tipo_licencia TEXT, PRIMARY KEY(id_tipo_licencia)) ENGINE = INNODB;
CREATE TABLE tramite (id_tramite INT AUTO_INCREMENT, nombre_tramite CHAR(40) NOT NULL, descripcion_tramite TEXT, PRIMARY KEY(id_tramite)) ENGINE = INNODB;
CREATE TABLE sf_guard_forgot_password (id BIGINT AUTO_INCREMENT, user_id BIGINT NOT NULL, unique_key VARCHAR(255), expires_at DATETIME NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX user_id_idx (user_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_group (id BIGINT AUTO_INCREMENT, name VARCHAR(255) UNIQUE, description TEXT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_group_permission (group_id BIGINT, permission_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(group_id, permission_id)) ENGINE = INNODB;
CREATE TABLE sf_guard_permission (id BIGINT AUTO_INCREMENT, name VARCHAR(255) UNIQUE, description TEXT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_remember_key (id BIGINT AUTO_INCREMENT, user_id BIGINT, remember_key VARCHAR(32), ip_address VARCHAR(50), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX user_id_idx (user_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_user (id BIGINT AUTO_INCREMENT, email_address VARCHAR(255) NOT NULL UNIQUE, username VARCHAR(128) NOT NULL UNIQUE, algorithm VARCHAR(128) DEFAULT 'sha1' NOT NULL, salt VARCHAR(128), password VARCHAR(128), is_active TINYINT(1) DEFAULT '1', is_super_admin TINYINT(1) DEFAULT '0', last_login DATETIME, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX is_active_idx_idx (is_active), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_user_group (user_id BIGINT, group_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(user_id, group_id)) ENGINE = INNODB;
CREATE TABLE sf_guard_user_permission (user_id BIGINT, permission_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(user_id, permission_id)) ENGINE = INNODB;
CREATE TABLE sf_guard_user_profile (id BIGINT AUTO_INCREMENT, user_id BIGINT UNIQUE NOT NULL, email_new VARCHAR(255) UNIQUE, nombres VARCHAR(32), apellido_paterno VARCHAR(70), apellido_materno VARCHAR(70), rut VARCHAR(11), validate_at DATETIME, validate VARCHAR(33), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX validate_idx (validate), INDEX user_id_idx (user_id), PRIMARY KEY(id)) ENGINE = INNODB;
ALTER TABLE clase_anterior ADD CONSTRAINT clase_anterior_id_tipo_licencia_tipo_licencia_id_tipo_licencia FOREIGN KEY (id_tipo_licencia) REFERENCES tipo_licencia(id_tipo_licencia);
ALTER TABLE clase_anterior ADD CONSTRAINT clase_anterior_id_solicitud_solicitud_licencia_id_solicitud FOREIGN KEY (id_solicitud) REFERENCES solicitud_licencia(id_solicitud);
ALTER TABLE conjunto_examenes ADD CONSTRAINT conjunto_examenes_id_tramite_tramite_id_tramite FOREIGN KEY (id_tramite) REFERENCES tramite(id_tramite);
ALTER TABLE conjunto_examenes ADD CONSTRAINT conjunto_examenes_id_examen_examen_id_examen FOREIGN KEY (id_examen) REFERENCES examen(id_examen);
ALTER TABLE conjunto_examenes ADD CONSTRAINT citi FOREIGN KEY (id_tipo_licencia) REFERENCES tipo_licencia(id_tipo_licencia);
ALTER TABLE conjunto_requisitos ADD CONSTRAINT conjunto_requisitos_id_tramite_tramite_id_tramite FOREIGN KEY (id_tramite) REFERENCES tramite(id_tramite);
ALTER TABLE conjunto_requisitos ADD CONSTRAINT conjunto_requisitos_id_requisito_requisito_id_requisito FOREIGN KEY (id_requisito) REFERENCES requisito(id_requisito);
ALTER TABLE conjunto_requisitos ADD CONSTRAINT citi_1 FOREIGN KEY (id_tipo_licencia) REFERENCES tipo_licencia(id_tipo_licencia);
ALTER TABLE dia_no_laboral ADD CONSTRAINT dia_no_laboral_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id);
ALTER TABLE pago ADD CONSTRAINT pago_id_solicitud_solicitud_licencia_id_solicitud FOREIGN KEY (id_solicitud) REFERENCES solicitud_licencia(id_solicitud);
ALTER TABLE solicitud_licencia ADD CONSTRAINT solicitud_licencia_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id);
ALTER TABLE solicitud_licencia ADD CONSTRAINT solicitud_licencia_id_tramite_tramite_id_tramite FOREIGN KEY (id_tramite) REFERENCES tramite(id_tramite);
ALTER TABLE solicitud_licencia ADD CONSTRAINT solicitud_licencia_id_pago_pago_id_pago FOREIGN KEY (id_pago) REFERENCES pago(id_pago);
ALTER TABLE solicitud_licencia ADD CONSTRAINT solicitud_licencia_id_hora_hora_id_hora FOREIGN KEY (id_hora) REFERENCES hora(id_hora);
ALTER TABLE solicitud_licencia ADD CONSTRAINT siti FOREIGN KEY (id_tipo_licencia) REFERENCES tipo_licencia(id_tipo_licencia);
ALTER TABLE sf_guard_forgot_password ADD CONSTRAINT sf_guard_forgot_password_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_group_permission ADD CONSTRAINT sf_guard_group_permission_permission_id_sf_guard_permission_id FOREIGN KEY (permission_id) REFERENCES sf_guard_permission(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_group_permission ADD CONSTRAINT sf_guard_group_permission_group_id_sf_guard_group_id FOREIGN KEY (group_id) REFERENCES sf_guard_group(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_remember_key ADD CONSTRAINT sf_guard_remember_key_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_group ADD CONSTRAINT sf_guard_user_group_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_group ADD CONSTRAINT sf_guard_user_group_group_id_sf_guard_group_id FOREIGN KEY (group_id) REFERENCES sf_guard_group(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_permission ADD CONSTRAINT sf_guard_user_permission_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_permission ADD CONSTRAINT sf_guard_user_permission_permission_id_sf_guard_permission_id FOREIGN KEY (permission_id) REFERENCES sf_guard_permission(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_profile ADD CONSTRAINT sf_guard_user_profile_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
