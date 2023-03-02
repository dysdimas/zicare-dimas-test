import http from "../http-common";

class PasienDataService {
  getAll() {
    return http.get("/pasien/list");
  }

  get(id) {
    return http.get(`/pasien/detail/${id}`);
  }

  create(data) {
    return http.post("/pasien", data);
  }

  update(id, data) {
    return http.put(`/pasien/${id}`, data);
  }

  delete(id) {
    return http.delete(`/pasien/${id}`);
  }
}

export default new PasienDataService();