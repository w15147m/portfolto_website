
export const getHeader = function () {
    const tokenData = JSON.parse(localStorage.getItem("accessToken") || "{}")?.accessToken;
    const headers = {
        Accept: "application/json",
        ...(tokenData && { Authorization: `Bearer ${tokenData}` })
    };
    return headers;
};

export function handleError(e) {
    let code = parseInt(e.response && e.response.status);
    if (code === 401 || code === 403) {
        console.log(e);
        logout();
    }
}

const funcApi = {
    async fetchData(url) {
        try {
            const response = await axios.get(url, {
                headers: getHeader(),
            });
            return response.data;
        } catch (error) {
            console.log(error);
            handleError(error);
            return null;
        }
    },
    async post(url, data) {
        try {
            const response = await axios.post(url, data, {
                headers: getHeader(),
            });
            return response;
        } catch (error) {
            console.log(error);
            handleError(error);
            throw error;
        }
    },
    async put(url, data) {
        try {
            const response = await axios.put(url, data, {
                headers: getHeader(),
            });
            return response;
        } catch (error) {
            console.log(error);
            handleError(error);
            return error.response.data;
        }
    },
    async deleteFromDb(url, row, data) {
        return new Promise((resolve) => {
            let highlightedText = row.info
                ? `<span class='text-primary'>${row.info}</span>`
                : `<span class='text-primary'>${row.title}</span>`;

            Swal.fire({
                title: "Confirmation",
                html: `Are you sure <br/> you want to delete ${highlightedText}?`,
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, Delete it!",
            }).then((result) => {
                if (result.isConfirmed) {
                    axios
                        .delete(url + row.id, {
                            headers: getHeader(),
                        })
                        .then((response) => {
                            toast.fire({
                                icon: "success",
                                timer: 3000,
                                title: "Deleted Successfully",
                            });
                            if (data) {
                                this.deleteFromList(data, row.id);
                            }
                            resolve(true); // Resolve the promise with true on success
                        })
                        .catch((error) => {
                            console.error(error);
                            Swal.fire({
                                icon: "error",
                                timer: 3000,
                                title: "Something Went Wrong",
                            });
                            resolve(false); // Resolve the promise with false on error
                        });
                } else {
                    resolve(false); // Resolve with false if action was canceled
                }
            });
        });
    },
    deleteFromList(obj, id) {
        const index = obj.findIndex((c) => c.id === id);
        if (index !== -1) {
            obj.splice(index, 1);
        }
        return obj;
    },
   

    async getCompStatus() {
        return await this.fetchData(
            "/api/status/" + this.getStoredObject("company").id
        );
    },
    async getCompLabels() {
        return await this.fetchData(
            "/api/labels/" + this.getStoredObject("company").id
        );
    },

 

    storeObject(variable, obj) {
        localStorage.setItem(variable, JSON.stringify(obj));
        return JSON.parse(localStorage.getItem(variable));
    },
    getStoredObject(variable) {
        return JSON.parse(localStorage.getItem(variable));
    },
    storeString(variable, string) {
        localStorage.setItem(variable, string);
        return localStorage.getItem(variable);
    },
    getStoredString(variable) {
        return localStorage.getItem(variable);
    },
    clearStoredString() {
        localStorage.clear();
    },
    log() {
        console.log("hello");
    },
};
export { funcApi };
