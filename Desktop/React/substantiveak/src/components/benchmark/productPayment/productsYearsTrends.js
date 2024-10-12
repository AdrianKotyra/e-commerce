import React, { useState, useEffect } from "react";
import { Chart } from "react-google-charts";

// Spinner component for loading state (optional)
const Spinner = () => <div className="spinner">Loading...</div>;

const ProductsTrends = () => {
  const [data, setData] = useState([]);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState(null);

  const API_URL = "https://substantive.pythonanywhere.com/product_benchmarks";

  // Fetch benchmark data
  useEffect(() => {
    const fetchData = async () => {
      try {
        const response = await fetch(API_URL, {
          method: "GET",
          headers: {
            "Content-Type": "application/json",
            "auth-key": "590e3e17b6a26a8fcda726e2a91520e476e2c894",
          },
        });

        if (!response.ok) {
          throw new Error(`Error: ${response.status}`);
        }

        const result = await response.json();
        const arrayWithKeysAndValues = Object.entries(result);
        setData(arrayWithKeysAndValues[0][1]); // Update with appropriate data structure

      } catch (err) {
        setError(err.message);
      } finally {
        setLoading(false);
      }
    };

    fetchData();
  }, []);


  if (loading) return <Spinner />;
  
  
  if (error) return <div>Error: {error}</div>;

  // Prepare data for year-on-year payment trends
  const productYearlyData = data.reduce((acc, item) => {
    const { product_name, payment, end_date } = item;

    if (!acc[product_name]) {
      acc[product_name] = {};
    }
    // Add payment for each year to the product
    if (!acc[product_name][end_date]) {
      acc[product_name][end_date] = 0;
    }
    acc[product_name][end_date] += payment;

    return acc;
  }, {});

  // Filter products with more than one year of payments
  const filteredProductData = Object.entries(productYearlyData).filter(
    ([_, end_date]) => Object.keys(end_date).length > 1
  );

  return (
    <div style={{ margin: '20px' }}>
      <h1 style={{ textAlign: 'center', marginBottom: '30px' }}>Year-on-Year Payment Trends</h1>
      
      {/* Render a line chart for each product */}
      {filteredProductData.map(([productName, yearData]) => {
        const chartData = [["Year", productName]]; // Initialize chart data

        // Get all years that appear in the data, sorted
        const allYears = Object.keys(yearData).sort();

        allYears.forEach((year) => {
          chartData.push([year, yearData[year] || 0]); // Push payment for that year or 0 if not available
        });

        return (
          <div key={productName} style={{ marginBottom: '40px' }}>
            <h2 style={{ textAlign: 'center' }}>{productName}</h2>
            <Chart
              chartType="LineChart"
              data={chartData}
              options={{
                title: `Year-on-Year Payment Trends for ${productName}`,
                hAxis: { title: "Year", format: 'yyyy' },
                vAxis: { title: "Payment ", format: 'short' },
                curveType: "function", // Smooth curves
                legend: { position: "bottom" },
                colors: ['#ff5722'], // Custom line color
              }}
              width="100%"
              height="400px"
            />
          </div>
        );
      })}
    </div>
  );
};

export default ProductsTrends;
