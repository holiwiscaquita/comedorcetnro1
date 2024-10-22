const express = require('express');
const { Pool } = require('pg');
const bodyParser = require('body-parser');
const app = express();
const port = process.env.PORT || 3000;

app.use(bodyParser.urlencoded({ extended: false }));
app.use(bodyParser.json());

const pool = new Pool({
  host: 'ep-lingering-resonance-a5wydir9.us-east-2.aws.neon.tech',
  user: 'Comedor_escolar_owner',
  password: 'IfJQNh60nrGW',
  database: 'Comedor_escolar',
  port: 5432,
  ssl: {
    rejectUnauthorized: false
  }
});

app.post('/procesar_reserva', (req, res) => {
  const { nombre, curso, email, horario } = req.body;

  const query = `INSERT INTO reservas (nombre, curso, email, horario) VALUES ($1, $2, $3, $4)`;

  pool.query(query, [nombre, curso, email, horario], (error, results) => {
    if (error) {
      return res.status(500).json({ error: error.message });
    }
    res.status(200).json({ message: 'Reserva guardada exitosamente!' });
  });
});
