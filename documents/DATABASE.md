# データベース設計

## テーブル定義書

### users

| COLUMN            | TYPE      | KEY     | DEFAULT | NOT NULL | AUTO INCREMENT |
| ----------------- | --------- | ------- | ------- | -------- | -------------- |
| id                | BIGINT    | PRIMARY |         | o        | o              |
| name              | VARCHAR   |         |         | o        |                |
| email             | VARCHAR   | UNIQUE  |         | o        |                |
| icon              | VARCHAR   |         |         |          |                |
| email_verified_at | TIMESTAMP |         |         |          |                |
| password          | VARCHAR   |         |         |          |                |
| remember_token    | VARCHAR   |         |         |          |                |
| created_at        | TIMESTAMP |         | NOW     | o        |                |
| updated_at        | TIMESTAMP |         | NOW     | o        |                |

---

### personal_access_tokens

| COLUMN         | TYPE      | KEY     | DEFAULT | NOT NULL | AUTO INCREMENT |
| -------------- | --------- | ------- | ------- | -------- | -------------- |
| id             | BIGINT    | PRIMARY |         | o        | o              |
| tokenable_type | VARCHAR   |         |         | o        |                |
| tokenable_id   | BIGINT    |         |         | o        |                |
| name           | VARCHAR   |         |         | o        |                |
| token          | VARCHAR   | UNIQUE  |         | o        |                |
| abilities      | TEXT      |         |         |          |                |
| last_used_at   | TIMESTAMP |         |         |          |                |
| expires_at     | TIMESTAMP |         |         |          |                |
| created_at     | TIMESTAMP |         | NOW     | o        |                |
| updated_at     | TIMESTAMP |         | NOW     | o        |                |

---

### questions

| COLUMN      | TYPE      | KEY     | DEFAULT | NOT NULL | AUTO INCREMENT |
| ----------- | --------- | ------- | ------- | -------- | -------------- |
| id          | BIGINT    | PRIMARY |         | o        | o              |
| title       | VARCHAR   |         |         | o        |                |
| content     | TEXT      |         |         | o        |                |
| is_resolved | BOOLEAN   |         | FALSE   | o        |                |
| created_at  | TIMESTAMP |         | NOW     | o        |                |
| updated_at  | TIMESTAMP |         | NOW     | o        |                |

---

### comments

| COLUMN      | TYPE      | KEY     | DEFAULT | NOT NULL | AUTO INCREMENT |
| ----------- | --------- | ------- | ------- | -------- | -------------- |
| id          | BIGINT    | PRIMARY |         | o        | o              |
| question_id | BIGINT    | FOREGIN |         | o        |                |
| content     | TEXT      |         |         | o        |                |
| created_at  | TIMESTAMP |         | NOW     | o        |                |
| updated_at  | TIMESTAMP |         | NOW     | o        |                |

---

### replies

| COLUMN     | TYPE      | KEY     | DEFAULT | NOT NULL | AUTO INCREMENT |
| ---------- | --------- | ------- | ------- | -------- | -------------- |
| id         | BIGINT    | PRIMARY |         | o        | o              |
| comment_id | BIGINT    | FOREIGN |         | o        |                |
| content    | TEXT      |         |         | o        |                |
| created_at | TIMESTAMP |         | NOW     | o        |                |
| updated_at | TIMESTAMP |         | NOW     | o        |                |

---

### categories

| COLUMN     | TYPE      | KEY     | DEFAULT | NOT NULL | AUTO INCREMENT |
| ---------- | --------- | ------- | ------- | -------- | -------------- |
| id         | BIGINT    | PRIMARY |         | o        | o              |
| name       | VARCHAR   |         |         | o        |                |
| created_at | TIMESTAMP |         | NOW     | o        |                |
| updated_at | TIMESTAMP |         | NOW     | o        |                |

---

### category_question

| COLUMN      | TYPE      | KEY     | DEFAULT | NOT NULL | AUTO INCREMENT |
| ----------- | --------- | ------- | ------- | -------- | -------------- |
| category_id | BIGINT    | FOREGIN |         | o        |                |
| question_id | BIGINT    | FOREGIN |         | o        |                |
| created_at  | TIMESTAMP |         | NOW     | o        |                |
| updated_at  | TIMESTAMP |         | NOW     | o        |                |

CONSTRAINT pk_category_question PRIMARY KEY (category_id, question_id)

---

### likes

| COLUMN      | TYPE      | KEY     | DEFAULT | NOT NULL | AUTO INCREMENT |
| ----------- | --------- | ------- | ------- | -------- | -------------- |
| id          | BIGINT    | PRIMARY |         | o        | o              |
| question_id | BIGINT    | FOREGIN |         | o        |                |
| user_id     | BIGINT    | FOREGIN |         | o        |                |
| created_at  | TIMESTAMP |         | NOW     | o        |                |
| updated_at  | TIMESTAMP |         | NOW     | o        |                |

---

### views

| COLUMN      | TYPE      | KEY     | DEFAULT | NOT NULL | AUTO INCREMENT |
| ----------- | --------- | ------- | ------- | -------- | -------------- |
| id          | BIGINT    | PRIMARY |         | o        | o              |
| question_id | BIGINT    | FOREGIN |         | o        |                |
| created_at  | TIMESTAMP |         | NOW     | o        |                |
| updated_at  | TIMESTAMP |         | NOW     | o        |                |

## ER 図
