--
-- PostgreSQL database dump
--

-- Dumped from database version 12.3 (Debian 12.3-1.pgdg100+1)
-- Dumped by pg_dump version 12.3 (Debian 12.3-1.pgdg100+1)

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

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: category; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.category (
    id integer NOT NULL,
    parent_id integer,
    title character varying,
    description text,
    keywords character varying
);


ALTER TABLE public.category OWNER TO pu;

--
-- Name: category_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.category_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.category_id_seq OWNER TO pu;

--
-- Name: category_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.category_id_seq OWNED BY public.category.id;


--
-- Name: order_product; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.order_product (
    id integer NOT NULL,
    order_id integer NOT NULL,
    product_id integer NOT NULL,
    title character varying(255) NOT NULL,
    price numeric(6,2) DEFAULT 0.00 NOT NULL,
    qty smallint NOT NULL,
    total numeric(6,2) NOT NULL
);


ALTER TABLE public.order_product OWNER TO pu;

--
-- Name: order_product_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.order_product_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.order_product_id_seq OWNER TO pu;

--
-- Name: order_product_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.order_product_id_seq OWNED BY public.order_product.id;


--
-- Name: orders; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.orders (
    id integer NOT NULL,
    created_at timestamp with time zone NOT NULL,
    updated_at timestamp with time zone NOT NULL,
    qty smallint NOT NULL,
    sum numeric(6,2) DEFAULT 0.00 NOT NULL,
    status smallint DEFAULT 0 NOT NULL,
    name character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    phone character varying(255) NOT NULL,
    address character varying(255) NOT NULL,
    note text
);


ALTER TABLE public.orders OWNER TO pu;

--
-- Name: orders_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.orders_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.orders_id_seq OWNER TO pu;

--
-- Name: orders_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.orders_id_seq OWNED BY public.orders.id;


--
-- Name: product; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.product (
    id integer NOT NULL,
    category_id integer NOT NULL,
    title character varying NOT NULL,
    content character varying,
    price numeric(6,2) NOT NULL,
    old_price numeric(6,2) NOT NULL,
    description text,
    keywords character varying,
    img character varying,
    is_offer integer
);


ALTER TABLE public.product OWNER TO pu;

--
-- Name: product_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.product_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.product_id_seq OWNER TO pu;

--
-- Name: product_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.product_id_seq OWNED BY public.product.id;


--
-- Name: user; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."user" (
    id integer NOT NULL,
    username character varying(255) NOT NULL,
    password character varying(255) NOT NULL,
    auth_key character varying(255) DEFAULT NULL::character varying
);


ALTER TABLE public."user" OWNER TO pu;

--
-- Name: user_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.user_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.user_id_seq OWNER TO pu;

--
-- Name: user_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.user_id_seq OWNED BY public."user".id;


--
-- Name: category id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.category ALTER COLUMN id SET DEFAULT nextval('public.category_id_seq'::regclass);


--
-- Name: order_product id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.order_product ALTER COLUMN id SET DEFAULT nextval('public.order_product_id_seq'::regclass);


--
-- Name: orders id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.orders ALTER COLUMN id SET DEFAULT nextval('public.orders_id_seq'::regclass);


--
-- Name: product id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.product ALTER COLUMN id SET DEFAULT nextval('public.product_id_seq'::regclass);


--
-- Name: user id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."user" ALTER COLUMN id SET DEFAULT nextval('public.user_id_seq'::regclass);


--
-- Data for Name: category; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.category (id, parent_id, title, description, keywords) FROM stdin;
1	0	Branded Foods	Branded Foods keywords	Branded Foods description
2	0	Households	Households keywords	Households description
3	0	Veggies & Fruits	Veggies & Fruits description	Veggies & Fruits keywords
4	3	Vegetables	Vegetables description	Vegetables keywords
6	0	Kitchen	\N	\N
7	0	Short Codes	\N	\N
8	0	Beverages	\N	\N
9	8	Soft Drinks	\N	\N
10	8	Juices	\N	\N
11	0	Pet Food	\N	\N
12	0	Frozen Foods	\N	\N
13	12	Frozen Snacks	\N	\N
14	12	Frozen Nonveg	\N	\N
15	0	Bread & Bakery	\N	\N
5	3	Fruits	Fruits description	Fruits keywords
\.


--
-- Data for Name: order_product; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.order_product (id, order_id, product_id, title, price, qty, total) FROM stdin;
6	4	1	knorr instant soup (100 gm)	3.00	1	3.00
7	5	1	knorr instant soup (100 gm)	3.00	1	3.00
8	6	4	premium bake rusk (300 gm)	5.00	1	5.00
9	8	4	premium bake rusk (300 gm)	5.00	1	5.00
10	9	4	premium bake rusk (300 gm)	5.00	2	10.00
11	10	4	premium bake rusk (300 gm)	5.00	2	10.00
12	11	4	premium bake rusk (300 gm)	5.00	2	10.00
13	12	4	premium bake rusk (300 gm)	5.00	2	10.00
14	13	4	premium bake rusk (300 gm)	5.00	2	10.00
15	14	4	premium bake rusk (300 gm)	5.00	2	10.00
\.


--
-- Data for Name: orders; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.orders (id, created_at, updated_at, qty, sum, status, name, email, phone, address, note) FROM stdin;
4	2020-12-02 14:20:18.205962+03	2020-12-02 14:20:18.205962+03	1	3.00	0	name	dobriypavlik@yandex.ru	11	address	test
6	2020-12-02 14:31:55.151491+03	2020-12-02 14:31:55.151491+03	1	5.00	0	name	dobriypavlik@yandex.ru	11	address	12345
8	2020-12-02 14:33:02.029264+03	2020-12-02 14:33:02.029264+03	1	5.00	0	name	dobriypavlik@yandex.ru	11	address	12345
9	2020-12-02 14:34:38.020791+03	2020-12-02 14:34:38.020791+03	2	10.00	0	name	dobriypavlik@yandex.ru	111	address	111111
10	2020-12-02 14:38:41.502241+03	2020-12-02 14:38:41.502241+03	2	10.00	0	name	dobriypavlik@yandex.ru	111	111
11	2020-12-02 14:39:04.047637+03	2020-12-02 14:39:04.047637+03	2	10.00	0	name	dobriypavlik@yandex.ru	111	111
12	2020-12-02 14:39:34.13421+03	2020-12-02 14:39:34.13421+03	2	10.00	0	name	dobriypavlik@yandex.ru	111	111
13	2020-12-02 14:44:50.795995+03	2020-12-02 14:44:50.795995+03	2	10.00	0	name	dobriypavlik@yandex.ru	111	111
14	2020-12-02 14:46:53.146208+03	2020-12-02 14:46:53.146208+03	2	10.00	0	name	dobriypavlik@yandex.ru	111	111
5	2020-12-02 14:26:16.739827+03	2020-12-02 14:26:16.739827+03	1	3.00	1	name	dobriypavlik@yandex.ru	132	a
\.


--
-- Data for Name: product; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.product (id, category_id, title, content, price, old_price, description, keywords, img, is_offer) FROM stdin;
5	4	fresh spinach (palak)	Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.	2.00	3.00	\N	\N	products/9.png	1
6	5	fresh mango dasheri (1 kg)	Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.	5.00	8.00	\N	\N	products/10.png	1
7	5	fresh apple red (1 kg)	Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.	6.00	8.00	\N	\N	products/11.png	1
8	4	fresh broccoli (500 gm)	Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.	4.00	6.00	\N	\N	products/12.png	1
9	10	mixed fruit juice (1 ltr)	Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.	3.00	0.00	\N	\N	products/13.png	1
11	9	coco cola zero can (330 ml)	Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.	3.00	0.00	\N	\N	products/15.png	1
12	9	sprite bottle (2 ltr)	Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.	3.00	0.00	\N	\N	products/16.png	1
2	1	chings noodles (75 gm)	Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.	5.00	8.00	\N	\N	products/6.png	0
3	1	lahsun sev (150 gm)	Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.	3.00	5.00	\N	\N	products/7.png	0
4	1	premium bake rusk (300 gm)	Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.	5.00	7.00	\N	\N	products/8.png	1
10	10	prune juice - sunsweet (1 ltr)	Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.	4.00	0.00			products/14.png	1
1	1	knorr instant soup (100 gm)	<p><img alt="" src="/upload/files/kim-instagram.png" style="float:left; height:30px; width:30px" />Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>\r\n\r\n<p><strong>Excepteur</strong> <em>sint</em> <u>occaecat</u> <s>cupidatat</s> non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>\r\n\r\n<p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>\r\n\r\n<p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>\r\n	3.00	0.00			products/5.png	1
25	1	new product	<p>fsdfsd</p>\r\n	3.00	0.00			products/2020-12-08/5fcf34df6e425_72.png	0
\.


--
-- Data for Name: user; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public."user" (id, username, password, auth_key) FROM stdin;
1	admin	$2y$13$PhGhfKGUiDGpSTyFLWumGuwrmwqOHR.Pob/CZQ7xCO4dHWQnDypr6	Slq5EwbFMNDyJw__mpd27hffTPIHj2qV
\.


--
-- Name: category_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.category_id_seq', 17, true);


--
-- Name: order_product_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.order_product_id_seq', 21, true);


--
-- Name: orders_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.orders_id_seq', 17, true);


--
-- Name: product_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.product_id_seq', 25, true);


--
-- Name: user_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.user_id_seq', 1, true);


--
-- Name: category category_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.category
    ADD CONSTRAINT category_pk PRIMARY KEY (id);


--
-- Name: order_product order_product_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.order_product
    ADD CONSTRAINT order_product_pk PRIMARY KEY (id);


--
-- Name: orders orders_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.orders
    ADD CONSTRAINT orders_pk PRIMARY KEY (id);


--
-- Name: product product_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.product
    ADD CONSTRAINT product_pk PRIMARY KEY (id);


--
-- Name: user user_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."user"
    ADD CONSTRAINT user_pkey PRIMARY KEY (id);


--
-- Name: category_id_uindex; Type: INDEX; Schema: public; Owner: postgres
--

CREATE UNIQUE INDEX category_id_uindex ON public.category USING btree (id);


--
-- Name: order_product_id_uindex; Type: INDEX; Schema: public; Owner: postgres
--

CREATE UNIQUE INDEX order_product_id_uindex ON public.order_product USING btree (id);


--
-- Name: orders_id_uindex; Type: INDEX; Schema: public; Owner: postgres
--

CREATE UNIQUE INDEX orders_id_uindex ON public.orders USING btree (id);


--
-- Name: product_id_uindex; Type: INDEX; Schema: public; Owner: postgres
--

CREATE UNIQUE INDEX product_id_uindex ON public.product USING btree (id);


--
-- Name: order_product order_product_orders_id_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.order_product
    ADD CONSTRAINT order_product_orders_id_fk FOREIGN KEY (order_id) REFERENCES public.orders(id) ON UPDATE RESTRICT ON DELETE CASCADE;


--
-- Name: order_product order_product_product_id_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.order_product
    ADD CONSTRAINT order_product_product_id_fk FOREIGN KEY (product_id) REFERENCES public.product(id) ON UPDATE RESTRICT ON DELETE CASCADE;


--
-- PostgreSQL database dump complete
--

