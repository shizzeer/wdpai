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
-- Name: dbname; Type: DATABASE; Schema: -; Owner: dbuser
--

CREATE DATABASE dbname WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE_PROVIDER = libc LOCALE = 'en_US.utf8';


ALTER DATABASE dbname OWNER TO dbuser;

\connect dbname

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
-- Name: Appointments; Type: TABLE; Schema: public; Owner: dbuser
--

CREATE TABLE public."Appointments" (
    "idAppointment" integer NOT NULL,
    date date NOT NULL,
    "time" time without time zone NOT NULL,
    price double precision NOT NULL,
    comments character varying(500),
    "idPatient" integer NOT NULL,
    "idDoctor" integer NOT NULL
);


ALTER TABLE public."Appointments" OWNER TO dbuser;

--
-- Name: Appointments_idAppointment_seq; Type: SEQUENCE; Schema: public; Owner: dbuser
--

CREATE SEQUENCE public."Appointments_idAppointment_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."Appointments_idAppointment_seq" OWNER TO dbuser;

--
-- Name: Appointments_idAppointment_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: dbuser
--

ALTER SEQUENCE public."Appointments_idAppointment_seq" OWNED BY public."Appointments"."idAppointment";


--
-- Name: Doctors; Type: TABLE; Schema: public; Owner: dbuser
--

CREATE TABLE public."Doctors" (
    "idDoctor" integer NOT NULL,
    "idUser" integer NOT NULL,
    specialization character varying(100)
);


ALTER TABLE public."Doctors" OWNER TO dbuser;

--
-- Name: Doctors_idDoctor_seq; Type: SEQUENCE; Schema: public; Owner: dbuser
--

CREATE SEQUENCE public."Doctors_idDoctor_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."Doctors_idDoctor_seq" OWNER TO dbuser;

--
-- Name: Doctors_idDoctor_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: dbuser
--

ALTER SEQUENCE public."Doctors_idDoctor_seq" OWNED BY public."Doctors"."idDoctor";


--
-- Name: Medicals; Type: TABLE; Schema: public; Owner: dbuser
--

CREATE TABLE public."Medicals" (
    "idMedical" integer NOT NULL,
    name character varying(100) NOT NULL
);


ALTER TABLE public."Medicals" OWNER TO dbuser;

--
-- Name: Medicals_To_Prescription; Type: TABLE; Schema: public; Owner: dbuser
--

CREATE TABLE public."Medicals_To_Prescription" (
    "idPrescription" integer NOT NULL,
    "idMedical" integer NOT NULL
);


ALTER TABLE public."Medicals_To_Prescription" OWNER TO dbuser;

--
-- Name: Medicals_idMedical_seq; Type: SEQUENCE; Schema: public; Owner: dbuser
--

CREATE SEQUENCE public."Medicals_idMedical_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."Medicals_idMedical_seq" OWNER TO dbuser;

--
-- Name: Medicals_idMedical_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: dbuser
--

ALTER SEQUENCE public."Medicals_idMedical_seq" OWNED BY public."Medicals"."idMedical";


--
-- Name: Patients; Type: TABLE; Schema: public; Owner: dbuser
--

CREATE TABLE public."Patients" (
    "idPatient" integer NOT NULL,
    "idUser" integer NOT NULL,
    "lastVisit" date
);


ALTER TABLE public."Patients" OWNER TO dbuser;

--
-- Name: Patients_idPatient_seq; Type: SEQUENCE; Schema: public; Owner: dbuser
--

CREATE SEQUENCE public."Patients_idPatient_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."Patients_idPatient_seq" OWNER TO dbuser;

--
-- Name: Patients_idPatient_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: dbuser
--

ALTER SEQUENCE public."Patients_idPatient_seq" OWNED BY public."Patients"."idPatient";


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
-- Name: Prescriptions_idPrescription_seq; Type: SEQUENCE; Schema: public; Owner: dbuser
--

CREATE SEQUENCE public."Prescriptions_idPrescription_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."Prescriptions_idPrescription_seq" OWNER TO dbuser;

--
-- Name: Prescriptions_idPrescription_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: dbuser
--

ALTER SEQUENCE public."Prescriptions_idPrescription_seq" OWNED BY public."Prescriptions"."idPrescription";


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
-- Name: Sessions_idUser_seq; Type: SEQUENCE; Schema: public; Owner: dbuser
--

CREATE SEQUENCE public."Sessions_idUser_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."Sessions_idUser_seq" OWNER TO dbuser;

--
-- Name: Sessions_idUser_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: dbuser
--

ALTER SEQUENCE public."Sessions_idUser_seq" OWNED BY public."Sessions"."idUser";


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
-- Name: User_Details_idUserDetails_seq; Type: SEQUENCE; Schema: public; Owner: dbuser
--

CREATE SEQUENCE public."User_Details_idUserDetails_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."User_Details_idUserDetails_seq" OWNER TO dbuser;

--
-- Name: User_Details_idUserDetails_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: dbuser
--

ALTER SEQUENCE public."User_Details_idUserDetails_seq" OWNED BY public."User_Details"."idUserDetails";


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
-- Name: Users_idUserDetails_seq; Type: SEQUENCE; Schema: public; Owner: dbuser
--

CREATE SEQUENCE public."Users_idUserDetails_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."Users_idUserDetails_seq" OWNER TO dbuser;

--
-- Name: Users_idUserDetails_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: dbuser
--

ALTER SEQUENCE public."Users_idUserDetails_seq" OWNED BY public."Users"."idUserDetails";


--
-- Name: Users_idUser_seq; Type: SEQUENCE; Schema: public; Owner: dbuser
--

CREATE SEQUENCE public."Users_idUser_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."Users_idUser_seq" OWNER TO dbuser;

--
-- Name: Users_idUser_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: dbuser
--

ALTER SEQUENCE public."Users_idUser_seq" OWNED BY public."Users"."idUser";


--
-- Name: Appointments idAppointment; Type: DEFAULT; Schema: public; Owner: dbuser
--

ALTER TABLE ONLY public."Appointments" ALTER COLUMN "idAppointment" SET DEFAULT nextval('public."Appointments_idAppointment_seq"'::regclass);


--
-- Name: Doctors idDoctor; Type: DEFAULT; Schema: public; Owner: dbuser
--

ALTER TABLE ONLY public."Doctors" ALTER COLUMN "idDoctor" SET DEFAULT nextval('public."Doctors_idDoctor_seq"'::regclass);


--
-- Name: Medicals idMedical; Type: DEFAULT; Schema: public; Owner: dbuser
--

ALTER TABLE ONLY public."Medicals" ALTER COLUMN "idMedical" SET DEFAULT nextval('public."Medicals_idMedical_seq"'::regclass);


--
-- Name: Patients idPatient; Type: DEFAULT; Schema: public; Owner: dbuser
--

ALTER TABLE ONLY public."Patients" ALTER COLUMN "idPatient" SET DEFAULT nextval('public."Patients_idPatient_seq"'::regclass);


--
-- Name: Prescriptions idPrescription; Type: DEFAULT; Schema: public; Owner: dbuser
--

ALTER TABLE ONLY public."Prescriptions" ALTER COLUMN "idPrescription" SET DEFAULT nextval('public."Prescriptions_idPrescription_seq"'::regclass);


--
-- Name: Sessions idUser; Type: DEFAULT; Schema: public; Owner: dbuser
--

ALTER TABLE ONLY public."Sessions" ALTER COLUMN "idUser" SET DEFAULT nextval('public."Sessions_idUser_seq"'::regclass);


--
-- Name: User_Details idUserDetails; Type: DEFAULT; Schema: public; Owner: dbuser
--

ALTER TABLE ONLY public."User_Details" ALTER COLUMN "idUserDetails" SET DEFAULT nextval('public."User_Details_idUserDetails_seq"'::regclass);


--
-- Name: Users idUser; Type: DEFAULT; Schema: public; Owner: dbuser
--

ALTER TABLE ONLY public."Users" ALTER COLUMN "idUser" SET DEFAULT nextval('public."Users_idUser_seq"'::regclass);


--
-- Name: Users idUserDetails; Type: DEFAULT; Schema: public; Owner: dbuser
--

ALTER TABLE ONLY public."Users" ALTER COLUMN "idUserDetails" SET DEFAULT nextval('public."Users_idUserDetails_seq"'::regclass);


--
-- Data for Name: Appointments; Type: TABLE DATA; Schema: public; Owner: dbuser
--

INSERT INTO public."Appointments" ("idAppointment", date, "time", price, comments, "idPatient", "idDoctor") VALUES (1, '2023-02-15', '15:00:00', 99.99, '', 4, 2);
INSERT INTO public."Appointments" ("idAppointment", date, "time", price, comments, "idPatient", "idDoctor") VALUES (2, '2023-05-06', '17:00:00', 99.99, '', 1, 3);


--
-- Data for Name: Doctors; Type: TABLE DATA; Schema: public; Owner: dbuser
--

INSERT INTO public."Doctors" ("idDoctor", "idUser", specialization) VALUES (2, 2, 'neurologist');
INSERT INTO public."Doctors" ("idDoctor", "idUser", specialization) VALUES (3, 3, 'dentist');


--
-- Data for Name: Medicals; Type: TABLE DATA; Schema: public; Owner: dbuser
--

INSERT INTO public."Medicals" ("idMedical", name) VALUES (1, 'Antybiotyk');
INSERT INTO public."Medicals" ("idMedical", name) VALUES (2, 'Apap');
INSERT INTO public."Medicals" ("idMedical", name) VALUES (3, 'Zinat');


--
-- Data for Name: Medicals_To_Prescription; Type: TABLE DATA; Schema: public; Owner: dbuser
--

INSERT INTO public."Medicals_To_Prescription" ("idPrescription", "idMedical") VALUES (1, 1);
INSERT INTO public."Medicals_To_Prescription" ("idPrescription", "idMedical") VALUES (1, 2);
INSERT INTO public."Medicals_To_Prescription" ("idPrescription", "idMedical") VALUES (2, 3);


--
-- Data for Name: Patients; Type: TABLE DATA; Schema: public; Owner: dbuser
--

INSERT INTO public."Patients" ("idPatient", "idUser", "lastVisit") VALUES (1, 1, NULL);
INSERT INTO public."Patients" ("idPatient", "idUser", "lastVisit") VALUES (4, 4, NULL);


--
-- Data for Name: Prescriptions; Type: TABLE DATA; Schema: public; Owner: dbuser
--

INSERT INTO public."Prescriptions" ("idPrescription", "idPatient", date, "treatmentStartDate", "idDoctor") VALUES (1, 4, '2023-02-13', '2023-02-13', 2);
INSERT INTO public."Prescriptions" ("idPrescription", "idPatient", date, "treatmentStartDate", "idDoctor") VALUES (2, 1, '2023-02-13', '2023-02-13', 3);


--
-- Data for Name: Sessions; Type: TABLE DATA; Schema: public; Owner: dbuser
--



--
-- Data for Name: User_Details; Type: TABLE DATA; Schema: public; Owner: dbuser
--

INSERT INTO public."User_Details" ("idUserDetails", name, surname, "dateOfBirth", "phoneNumber", "identityNumber") VALUES (1, 'Test', 'Testowy', '1993-06-10', '111111111', '12312312345');
INSERT INTO public."User_Details" ("idUserDetails", name, surname, "dateOfBirth", "phoneNumber", "identityNumber") VALUES (2, 'Lekarz', 'Testowy', '1994-05-24', '123123123', '33344455566');
INSERT INTO public."User_Details" ("idUserDetails", name, surname, "dateOfBirth", "phoneNumber", "identityNumber") VALUES (3, 'Lekarz', 'Testowy II', '1993-03-23', '444444444', '77788899910');
INSERT INTO public."User_Details" ("idUserDetails", name, surname, "dateOfBirth", "phoneNumber", "identityNumber") VALUES (4, 'Test', 'Drugi', '1987-04-05', '555555555', '99988877766');


--
-- Data for Name: Users; Type: TABLE DATA; Schema: public; Owner: dbuser
--

INSERT INTO public."Users" ("idUser", email, password, role, "idUserDetails") VALUES (1, 'test@test.com', '$2y$10$QqtNDG1BJsI7RwSp3Wnqvu3OyfKtTzddVnQLdcNdmx2zYkb2UGDdG', 'patient', 1);
INSERT INTO public."Users" ("idUser", email, password, role, "idUserDetails") VALUES (2, 'ltestowy@test.com', '$2y$10$pOzDaVQTvD092LBW/mo6E.9cBl8CsPhFKymNR5ai7KxjEzXPRLVpW', 'doctor', 2);
INSERT INTO public."Users" ("idUser", email, password, role, "idUserDetails") VALUES (3, 'ltestowy2@test.com', '$2y$10$ZQvJiYxaqf1/kxdOpIxHaeH0hfEqquxuQ3rKX4WQ4vgz8r1p4xvQe', 'doctor', 3);
INSERT INTO public."Users" ("idUser", email, password, role, "idUserDetails") VALUES (4, 'tdrugi@test.com', '$2y$10$FMXJ8KalpxRTg17X4DYMWOoiz1J9iI3jljlSgYISgSfZ6SPGE/oLG', 'patient', 4);


--
-- Name: Appointments_idAppointment_seq; Type: SEQUENCE SET; Schema: public; Owner: dbuser
--

SELECT pg_catalog.setval('public."Appointments_idAppointment_seq"', 2, true);


--
-- Name: Doctors_idDoctor_seq; Type: SEQUENCE SET; Schema: public; Owner: dbuser
--

SELECT pg_catalog.setval('public."Doctors_idDoctor_seq"', 1, false);


--
-- Name: Medicals_idMedical_seq; Type: SEQUENCE SET; Schema: public; Owner: dbuser
--

SELECT pg_catalog.setval('public."Medicals_idMedical_seq"', 3, true);


--
-- Name: Patients_idPatient_seq; Type: SEQUENCE SET; Schema: public; Owner: dbuser
--

SELECT pg_catalog.setval('public."Patients_idPatient_seq"', 4, true);


--
-- Name: Prescriptions_idPrescription_seq; Type: SEQUENCE SET; Schema: public; Owner: dbuser
--

SELECT pg_catalog.setval('public."Prescriptions_idPrescription_seq"', 2, true);


--
-- Name: Sessions_idUser_seq; Type: SEQUENCE SET; Schema: public; Owner: dbuser
--

SELECT pg_catalog.setval('public."Sessions_idUser_seq"', 1, false);


--
-- Name: User_Details_idUserDetails_seq; Type: SEQUENCE SET; Schema: public; Owner: dbuser
--

SELECT pg_catalog.setval('public."User_Details_idUserDetails_seq"', 4, true);


--
-- Name: Users_idUserDetails_seq; Type: SEQUENCE SET; Schema: public; Owner: dbuser
--

SELECT pg_catalog.setval('public."Users_idUserDetails_seq"', 4, true);


--
-- Name: Users_idUser_seq; Type: SEQUENCE SET; Schema: public; Owner: dbuser
--

SELECT pg_catalog.setval('public."Users_idUser_seq"', 4, true);


--
-- Name: Appointments Appointments_idAppointment_key; Type: CONSTRAINT; Schema: public; Owner: dbuser
--

ALTER TABLE ONLY public."Appointments"
    ADD CONSTRAINT "Appointments_idAppointment_key" UNIQUE ("idAppointment");


--
-- Name: Appointments Appointments_pk; Type: CONSTRAINT; Schema: public; Owner: dbuser
--

ALTER TABLE ONLY public."Appointments"
    ADD CONSTRAINT "Appointments_pk" PRIMARY KEY ("idAppointment");


--
-- Name: Doctors Doctors_pk; Type: CONSTRAINT; Schema: public; Owner: dbuser
--

ALTER TABLE ONLY public."Doctors"
    ADD CONSTRAINT "Doctors_pk" PRIMARY KEY ("idDoctor");


--
-- Name: Medicals Medicals_idMedical_key; Type: CONSTRAINT; Schema: public; Owner: dbuser
--

ALTER TABLE ONLY public."Medicals"
    ADD CONSTRAINT "Medicals_idMedical_key" UNIQUE ("idMedical");


--
-- Name: Patients Patients_idPatient_key; Type: CONSTRAINT; Schema: public; Owner: dbuser
--

ALTER TABLE ONLY public."Patients"
    ADD CONSTRAINT "Patients_idPatient_key" UNIQUE ("idPatient");


--
-- Name: Sessions Sessions_pk; Type: CONSTRAINT; Schema: public; Owner: dbuser
--

ALTER TABLE ONLY public."Sessions"
    ADD CONSTRAINT "Sessions_pk" PRIMARY KEY ("idSession");


--
-- Name: Users Users_idUserDetails_key; Type: CONSTRAINT; Schema: public; Owner: dbuser
--

ALTER TABLE ONLY public."Users"
    ADD CONSTRAINT "Users_idUserDetails_key" UNIQUE ("idUserDetails");


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
-- Name: Appointments Appointments_Doctors_idDoctor_fk; Type: FK CONSTRAINT; Schema: public; Owner: dbuser
--

ALTER TABLE ONLY public."Appointments"
    ADD CONSTRAINT "Appointments_Doctors_idDoctor_fk" FOREIGN KEY ("idDoctor") REFERENCES public."Doctors"("idDoctor");


--
-- Name: Appointments Appointments_Patients_idPatient_fk; Type: FK CONSTRAINT; Schema: public; Owner: dbuser
--

ALTER TABLE ONLY public."Appointments"
    ADD CONSTRAINT "Appointments_Patients_idPatient_fk" FOREIGN KEY ("idPatient") REFERENCES public."Patients"("idPatient");


--
-- Name: Doctors Doctors_Users__fk; Type: FK CONSTRAINT; Schema: public; Owner: dbuser
--

ALTER TABLE ONLY public."Doctors"
    ADD CONSTRAINT "Doctors_Users__fk" FOREIGN KEY ("idUser") REFERENCES public."Users"("idUser");


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

