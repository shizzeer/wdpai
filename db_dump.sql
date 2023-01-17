--
-- PostgreSQL database dump
--

-- Dumped from database version 15.1 (Debian 15.1-1.pgdg110+1)
-- Dumped by pg_dump version 15.1

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: dbname_schema; Type: SCHEMA; Schema: -; Owner: dbuser
--

CREATE SCHEMA dbname_schema;


ALTER SCHEMA dbname_schema OWNER TO dbuser;

--
-- Name: uuid-ossp; Type: EXTENSION; Schema: -; Owner: -
--

CREATE EXTENSION IF NOT EXISTS "uuid-ossp" WITH SCHEMA public;


--
-- Name: EXTENSION "uuid-ossp"; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION "uuid-ossp" IS 'generate universally unique identifiers (UUIDs)';


SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: Doctors; Type: TABLE; Schema: public; Owner: dbuser
--

CREATE TABLE public."Doctors" (
    "idDoctor" integer NOT NULL,
    "idUser" integer NOT NULL
);


ALTER TABLE public."Doctors" OWNER TO dbuser;

--
-- Name: Medicals; Type: TABLE; Schema: public; Owner: dbuser
--

CREATE TABLE public."Medicals" (
    "idMedical" integer NOT NULL,
    name character varying(100) NOT NULL,
    available boolean NOT NULL
);


ALTER TABLE public."Medicals" OWNER TO dbuser;

--
-- Name: Medicals_To_Patients; Type: TABLE; Schema: public; Owner: dbuser
--

CREATE TABLE public."Medicals_To_Patients" (
    "idPatient" integer NOT NULL,
    "idMedical" integer NOT NULL
);


ALTER TABLE public."Medicals_To_Patients" OWNER TO dbuser;

--
-- Name: Medicals_To_Prescription; Type: TABLE; Schema: public; Owner: dbuser
--

CREATE TABLE public."Medicals_To_Prescription" (
    "idPrescription" integer NOT NULL,
    "idMedical" integer NOT NULL
);


ALTER TABLE public."Medicals_To_Prescription" OWNER TO dbuser;

--
-- Name: Patients; Type: TABLE; Schema: public; Owner: dbuser
--

CREATE TABLE public."Patients" (
    "idPatient" integer NOT NULL,
    "idUser" integer NOT NULL,
    "lastVisit" date NOT NULL
);


ALTER TABLE public."Patients" OWNER TO dbuser;

--
-- Name: Prescriptions; Type: TABLE; Schema: public; Owner: dbuser
--

CREATE TABLE public."Prescriptions" (
    "idPrescription" integer NOT NULL,
    "idPatient" integer NOT NULL,
    date date NOT NULL,
    "treatmentStartDate" date NOT NULL,
    "idDoctor" integer NOT NULL
);


ALTER TABLE public."Prescriptions" OWNER TO dbuser;

--
-- Name: Sessions; Type: TABLE; Schema: public; Owner: dbuser
--

CREATE TABLE public."Sessions" (
    "idUser" integer NOT NULL,
    "remoteIP" character varying(15) NOT NULL,
    "userRole" character varying(10) NOT NULL,
    "startedAt" bigint NOT NULL,
    "idSession" uuid NOT NULL
);


ALTER TABLE public."Sessions" OWNER TO dbuser;

--
-- Name: User_Details; Type: TABLE; Schema: public; Owner: dbuser
--

CREATE TABLE public."User_Details" (
    "idUserDetails" integer NOT NULL,
    name character varying(50) NOT NULL,
    surname character varying(60) NOT NULL,
    "dateOfBirth" date NOT NULL,
    "phoneNumber" character varying(9) NOT NULL,
    "identityNumber" character varying(11) NOT NULL
);


ALTER TABLE public."User_Details" OWNER TO dbuser;

--
-- Name: Users; Type: TABLE; Schema: public; Owner: dbuser
--

CREATE TABLE public."Users" (
    "idUser" integer NOT NULL,
    email character varying(255) NOT NULL,
    password character varying(255) NOT NULL,
    role character varying(50) NOT NULL,
    "idUserDetails" integer NOT NULL
);


ALTER TABLE public."Users" OWNER TO dbuser;

--
-- Data for Name: Doctors; Type: TABLE DATA; Schema: public; Owner: dbuser
--



--
-- Data for Name: Medicals; Type: TABLE DATA; Schema: public; Owner: dbuser
--



--
-- Data for Name: Medicals_To_Patients; Type: TABLE DATA; Schema: public; Owner: dbuser
--



--
-- Data for Name: Medicals_To_Prescription; Type: TABLE DATA; Schema: public; Owner: dbuser
--



--
-- Data for Name: Patients; Type: TABLE DATA; Schema: public; Owner: dbuser
--



--
-- Data for Name: Prescriptions; Type: TABLE DATA; Schema: public; Owner: dbuser
--



--
-- Data for Name: Sessions; Type: TABLE DATA; Schema: public; Owner: dbuser
--



--
-- Data for Name: User_Details; Type: TABLE DATA; Schema: public; Owner: dbuser
--

INSERT INTO public."User_Details" ("idUserDetails", name, surname, "dateOfBirth", "phoneNumber", "identityNumber") VALUES (1, 'Jan', 'Nowak', '1992-01-12', '123456789', '00222007492');
INSERT INTO public."User_Details" ("idUserDetails", name, surname, "dateOfBirth", "phoneNumber", "identityNumber") VALUES (2, 'Jan', 'Kowalski', '1980-02-10', '123456788', '00333007999');


--
-- Data for Name: Users; Type: TABLE DATA; Schema: public; Owner: dbuser
--

INSERT INTO public."Users" ("idUser", email, password, role, "idUserDetails") VALUES (1, 'jnowak@gmail.com', 'password', 'patient', 1);
INSERT INTO public."Users" ("idUser", email, password, role, "idUserDetails") VALUES (2, 'jkowalski@gmail.com', 'password123', 'doctor', 2);


--
-- Name: Doctors Doctors_pk; Type: CONSTRAINT; Schema: public; Owner: dbuser
--

ALTER TABLE ONLY public."Doctors"
    ADD CONSTRAINT "Doctors_pk" PRIMARY KEY ("idDoctor");


--
-- Name: Sessions Sessions_pk; Type: CONSTRAINT; Schema: public; Owner: dbuser
--

ALTER TABLE ONLY public."Sessions"
    ADD CONSTRAINT "Sessions_pk" PRIMARY KEY ("idSession");


--
-- Name: Users id; Type: CONSTRAINT; Schema: public; Owner: dbuser
--

ALTER TABLE ONLY public."Users"
    ADD CONSTRAINT id PRIMARY KEY ("idUser");


--
-- Name: Medicals idMedical; Type: CONSTRAINT; Schema: public; Owner: dbuser
--

ALTER TABLE ONLY public."Medicals"
    ADD CONSTRAINT "idMedical" PRIMARY KEY ("idMedical");


--
-- Name: Patients idPatient; Type: CONSTRAINT; Schema: public; Owner: dbuser
--

ALTER TABLE ONLY public."Patients"
    ADD CONSTRAINT "idPatient" PRIMARY KEY ("idPatient");


--
-- Name: Prescriptions idPrescription; Type: CONSTRAINT; Schema: public; Owner: dbuser
--

ALTER TABLE ONLY public."Prescriptions"
    ADD CONSTRAINT "idPrescription" PRIMARY KEY ("idPrescription");


--
-- Name: User_Details idUserDetails; Type: CONSTRAINT; Schema: public; Owner: dbuser
--

ALTER TABLE ONLY public."User_Details"
    ADD CONSTRAINT "idUserDetails" PRIMARY KEY ("idUserDetails");


--
-- Name: Doctors Doctors_Users__fk; Type: FK CONSTRAINT; Schema: public; Owner: dbuser
--

ALTER TABLE ONLY public."Doctors"
    ADD CONSTRAINT "Doctors_Users__fk" FOREIGN KEY ("idUser") REFERENCES public."Users"("idUser");


--
-- Name: Medicals_To_Patients Medicals_To_Patients_Medicals_idMedical_fk; Type: FK CONSTRAINT; Schema: public; Owner: dbuser
--

ALTER TABLE ONLY public."Medicals_To_Patients"
    ADD CONSTRAINT "Medicals_To_Patients_Medicals_idMedical_fk" FOREIGN KEY ("idMedical") REFERENCES public."Medicals"("idMedical");


--
-- Name: Medicals_To_Patients Medicals_To_Patients_Patients_idPatient_fk; Type: FK CONSTRAINT; Schema: public; Owner: dbuser
--

ALTER TABLE ONLY public."Medicals_To_Patients"
    ADD CONSTRAINT "Medicals_To_Patients_Patients_idPatient_fk" FOREIGN KEY ("idPatient") REFERENCES public."Patients"("idPatient");


--
-- Name: Medicals_To_Prescription Medicals_To_Prescription_Medicals_idMedical_fk; Type: FK CONSTRAINT; Schema: public; Owner: dbuser
--

ALTER TABLE ONLY public."Medicals_To_Prescription"
    ADD CONSTRAINT "Medicals_To_Prescription_Medicals_idMedical_fk" FOREIGN KEY ("idMedical") REFERENCES public."Medicals"("idMedical");


--
-- Name: Medicals_To_Prescription Medicals_To_Prescription_Prescriptions_idPrescription_fk; Type: FK CONSTRAINT; Schema: public; Owner: dbuser
--

ALTER TABLE ONLY public."Medicals_To_Prescription"
    ADD CONSTRAINT "Medicals_To_Prescription_Prescriptions_idPrescription_fk" FOREIGN KEY ("idPrescription") REFERENCES public."Prescriptions"("idPrescription");


--
-- Name: Patients Patients_Users_idUser_fk; Type: FK CONSTRAINT; Schema: public; Owner: dbuser
--

ALTER TABLE ONLY public."Patients"
    ADD CONSTRAINT "Patients_Users_idUser_fk" FOREIGN KEY ("idUser") REFERENCES public."Users"("idUser");


--
-- Name: Prescriptions Prescriptions_Doctors_idDoctor_fk; Type: FK CONSTRAINT; Schema: public; Owner: dbuser
--

ALTER TABLE ONLY public."Prescriptions"
    ADD CONSTRAINT "Prescriptions_Doctors_idDoctor_fk" FOREIGN KEY ("idDoctor") REFERENCES public."Doctors"("idDoctor");


--
-- Name: Prescriptions Prescriptions_Patients_idPatient_fk; Type: FK CONSTRAINT; Schema: public; Owner: dbuser
--

ALTER TABLE ONLY public."Prescriptions"
    ADD CONSTRAINT "Prescriptions_Patients_idPatient_fk" FOREIGN KEY ("idPatient") REFERENCES public."Patients"("idPatient");


--
-- Name: Sessions Sessions_Users_idUser_fk; Type: FK CONSTRAINT; Schema: public; Owner: dbuser
--

ALTER TABLE ONLY public."Sessions"
    ADD CONSTRAINT "Sessions_Users_idUser_fk" FOREIGN KEY ("idUser") REFERENCES public."Users"("idUser");


--
-- Name: Users Users_User_Details_fk; Type: FK CONSTRAINT; Schema: public; Owner: dbuser
--

ALTER TABLE ONLY public."Users"
    ADD CONSTRAINT "Users_User_Details_fk" FOREIGN KEY ("idUserDetails") REFERENCES public."User_Details"("idUserDetails");


--
-- PostgreSQL database dump complete
--

