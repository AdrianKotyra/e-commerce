import React, { useState, useEffect } from "react";
import Benchmark from "../benchmark/benchmarkPayment";
import { Chart } from "react-google-charts";
import CardProvider from "../CardProvider/cardProvider";
import ProductsTrends from "../benchmark/productPayment/productsYearsTrends";
const ProvidersTotals = () => {
  const [data, setData] = useState(null);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState(null);
  const [rates, setRates] = useState([]);

  const API_URL_PRODUCT_BENCHMARK = "https://substantive.pythonanywhere.com/product_benchmarks";
  const API_URL_EXCHANGE = "https://substantive.pythonanywhere.com/exchange_rates";

  useEffect(() => {
    const fetchData = async () => {
      setLoading(true);
      try {
        // Fetch exchange rates first
        const responseRates = await fetch(API_URL_EXCHANGE, {
          method: "GET",
          headers: {
            "Content-Type": "application/json",
            "auth-key": "590e3e17b6a26a8fcda726e2a91520e476e2c894",
          },
        });

        if (!responseRates.ok) {
          throw new Error(`Error fetching rates: ${responseRates.status}`);
        }

        const resultRates = await responseRates.json();
        const resultRatesKeysAndValues = Object.entries(resultRates);
        setRates(resultRatesKeysAndValues[0][1]);

        // Fetch product benchmarks after successfully fetching rates
        const responseData = await fetch(API_URL_PRODUCT_BENCHMARK, {
          method: "GET",
          headers: {
            "Content-Type": "application/json",
            "auth-key": "590e3e17b6a26a8fcda726e2a91520e476e2c894",
          },
        });

        if (!responseData.ok) {
          throw new Error(`Error fetching data: ${responseData.status}`);
        }

        const resultData = await responseData.json();
        const arrayWithKeysAndValues = Object.entries(resultData);
        setData(arrayWithKeysAndValues[0][1]);

      } catch (err) {
        setError(err.message);
      } finally {
        setLoading(false);
      }
    };

    fetchData();
  }, []);

  // If loading or error, render appropriate message
  if (loading) return <div>Loading...</div>;
  if (error) return <div>Error: {error}</div>;
  console.log(data)
  // Process and update data with currency conversion
  const updatedData = data.map(itemData => {
    const { provider_name, benchmark, payment, currency, start_date } = itemData;

    // Extract the year from start_date
    const year = new Date(start_date).getFullYear();

    // Find the exchange rate for this currency and year
    const rate = rates.find(rate =>
      rate.from_currency_id === currency.id &&
      rate.to_currency_id === 3 && // Assuming 3 is EUR
      rate.year === year
    );

    if (rate) {
      // Convert benchmark and payment to EUR using the exchange rate
      const convertedBenchmark = (benchmark * rate.exchange_rate).toFixed(2);
      const convertedPayment = (payment * rate.exchange_rate).toFixed(2);

      return {
        ...itemData,
        benchmark: parseFloat(convertedBenchmark), // Convert string back to number
        payment: parseFloat(convertedPayment),     // Convert string back to number
        currency: currency.id // Replace the whole currency object with just its ID
      };
    } else {
     
      return itemData; // Return the original item if no rate is found
    }
  });

  // Grouping the updated data by provider_name
  const groupedData = updatedData.reduce((acc, item) => {
    const { provider_name, benchmark, payment } = item;

    // Initialize provider if it doesn't exist in acc
    if (!acc[provider_name]) {
      acc[provider_name] = { totalBenchmark: 0, totalPayment: 0 };
    }

    // Sum benchmark and payment for each provider
    acc[provider_name].totalBenchmark += benchmark;
    acc[provider_name].totalPayment += payment;

    return acc;
  }, {});

  return (
    <div>
      <h1>Provider Totals</h1>
      {Object.entries(groupedData).map(([providerName, totals]) => (
        <CardProvider key={providerName}>
          <Benchmark
            providerName={providerName}
            sumBenchmark={totals.totalBenchmark.toFixed(2)}
            sumPayments={totals.totalPayment.toFixed(2)}
            difference={(totals.totalBenchmark - totals.totalPayment).toFixed(2)}
          />
          <Chart chartType="PieChart" data={[
            ["Difference", "Benchmark - Payments"],
            ["Benchmark", totals.totalBenchmark],
            ["Payments", totals.totalPayment],
          ]} />

         
        </CardProvider>
        
      ))}
      <ProductsTrends/>
    </div>
  );
};

export default ProvidersTotals;
