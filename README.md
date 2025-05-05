| Método | Rota                                         | Descrição                                                                 |
|--------|----------------------------------------------|---------------------------------------------------------------------------|
| POST   | `/api/department`                            | Cria um novo departamento                                                 |
| POST   | `/api/employee`                              | Cria um novo funcionário                                                  |
| GET    | `/api/department`                            | Lista todos os departamentos                                              |
| GET    | `/api/employee`                              | Lista todos os funcionários                                               |
| GET    | `/api/department/{id}`                       | Retorna os dados de um departamento específico                            |
| GET    | `/api/employee/{id}`                         | Retorna os dados de um funcionário específico                             |
| DELETE | `/api/department/delete/{id}`                | Deleta um departamento pelo ID                                            |
| DELETE | `/api/employee/delete/{id}`                  | Deleta um funcionário pelo ID                                             |
| PUT    | `/api/department/update/{id}`                | Atualiza os dados de um departamento pelo ID                              |
| PUT    | `/api/employee/update/{id}`                  | Atualiza os dados de um funcionário pelo ID                               |
| GET    | `/api/department-has-employee`               | Retorna departamentos que têm funcionários associados                     |
| GET    | `/api/employee-has-department`               | Retorna funcionários que estão associados a departamentos                 |
| GET    | `/api/department/{id}/employee`              | Retorna os funcionários de um departamento                                |
| GET    | `/api/employee/{id}/department`              | Retorna o departamento de um funcionário                                  |
