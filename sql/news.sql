/*
 Navicat Premium Data Transfer

 Source Server         : news
 Source Server Type    : PostgreSQL
 Source Server Version : 140005
 Source Host           : localhost:5432
 Source Catalog        : news
 Source Schema         : public

 Target Server Type    : PostgreSQL
 Target Server Version : 140005
 File Encoding         : 65001

 Date: 17/08/2022 16:02:49
*/


-- ----------------------------
-- Table structure for news
-- ----------------------------
DROP TABLE IF EXISTS "public"."news";
CREATE TABLE "public"."news" (
  "id" int8 NOT NULL DEFAULT nextval('news_id_seq'::regclass),
  "created_at" timestamp(0),
  "updated_at" timestamp(0),
  "title" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "date" timestamp(0) NOT NULL,
  "url" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "source" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "contents" text COLLATE "pg_catalog"."default" NOT NULL
)
;

-- ----------------------------
-- Primary Key structure for table news
-- ----------------------------
ALTER TABLE "public"."news" ADD CONSTRAINT "news_pkey" PRIMARY KEY ("id");
