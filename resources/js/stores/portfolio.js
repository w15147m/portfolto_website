import { defineStore } from 'pinia';
import { funcApi } from "@/common/utilities/apiFunctions";

export const usePortfolioStore = defineStore('portfolio', {
  state: () => ({
    portfolioId: null,
    data: [], // Store portfolio data
  }),
  actions: {
    async fetchPortfolio() {
      const user = funcApi.getStoredObject("authUser");
      const response = await funcApi.fetchData(`/api/portfolio/user/${user.id}`);
      if (response) {
        this.portfolioId = Array.isArray(response) ? response[0]?.id : response.id;
        this.data = response;  
      }
    },
  },
  getters: {
    getPortfolioId: (state) => state.portfolioId,
    getPortfolioData: (state) => state.data,
  },
});
